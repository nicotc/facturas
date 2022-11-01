<?php

namespace Modules\Services\Http\Livewire\Services;

use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Excel;
use Modules\Services\Entities\Service;

class Index extends Component
{
    use WithPagination;
    public $sortColumn = 'id';
    public $sortDirection = "asc";
    public $hydrate;
    public $searchTerm = '';
    public $globalSearch = '';
    protected $listeners = [
        'searchLocal'
    ];

    public function searchLocal($global)
    {
        $this->searchTerm = $global;
    }

    private function getHeaders()
    {
        return [
            // 'id' => 'ID',
            'name' => trans('Servicio'),
            'description' => trans('Descripción'),

        ];
    }

    public function sort($column)
    {
        if ($this->sortColumn == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        }
        $this->sortColumn = $column;
    }

    private function buildQuery()
    {
        return Service::select(
            'services.id',
            'services.name',
            'services.description',
        )->where(function ($query) {
            if ($this->searchTerm != '') {
                $query->where('services.name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('services.description', 'like', '%' . $this->searchTerm . '%')
                    ;
            }
        })
        ->orderBy($this->sortColumn, $this->sortDirection);


    }


    private function getUsers()
    {
        return $this->buildQuery()->paginate(10);
    }


    public function render()
    {
        return view(
            'services::livewire.services.index', [
            'data' => $this->getUsers(),
            'headers' => $this->getHeaders(),
        ]);
    }

    public function show($id)
    {
        redirect()->route('services.show', $id);
    }

    public function edit($id)
    {
        redirect()->route('services.edit', $id);
    }

    public function destroy($id)
    {
        $this->emit('delete', $id);
    }

    public function add()
    {
        redirect()->route('services.create');
    }

    public function exportExcel()
    {
        $data = $this->buildQuery()->get()->toArray();
        return
            Excel::create('Filename', function ($excel) {

                $excel->sheet('Sheetname', function ($sheet) {

                    $sheet->fromArray(array(
                        array('data1', 'data2'),
                        array('data3', 'data4')
                    ));
                });
            })->export('xls');
    }
}