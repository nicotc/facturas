<?php

namespace Modules\Inventory\Http\Livewire\Inventory;

use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Excel;
use Modules\Contact\Entities\Contact;
use Modules\Inventory\Entities\Inventory;

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
            'id' => 'ID',
            'name' => trans('name'),
            'description' => trans('description'),
            'image' => trans('image'),
            'stock' => trans('stock'),
            'stock_alert' => trans('stock_alert'),
            'price' => trans('price'),
            'cost' => trans('cost'),
            'type' => trans('type')

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
        return Inventory::select(
            'id',
            'name',
            'description',
            'image',
            'stock',
            'stock_alert',
            'price',
            'cost',
            'type'
        )->where(function ($query) {
            if ($this->searchTerm != '') {
                $query->where('name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('image', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('stock', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('stock_alert', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('price', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('cost', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('type', 'like', '%' . $this->searchTerm . '%');
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

            'inventory::livewire.inventory.index',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
            ]
        );
    }

    public function show($id)
    {
        redirect()->route('inventory.show', $id);
    }

    public function edit($id)
    {
        redirect()->route('inventory.edit', $id);
    }

    public function destroy($id)
    {
        $this->emit('delete', $id);
    }

    public function add()
    {
        redirect()->route('inventory.create');
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