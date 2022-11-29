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
    public $ServiceID;
    public $name;
    public $idService;
    public $description;
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


    public function editId($id)
    {
        $serviceSQL  = Service::find($id);
        $this->idService = $id;
        $this->name = $serviceSQL->name;
        $this->description = $serviceSQL->description;

    }


    public function edit()
    {
        $serviceSQL  = Service::find($this->idService);
        $serviceSQL->name = $this->name;
        $serviceSQL->description = $this->description;
        $serviceSQL->save();


    }


    public function add()
    {
        Service::create([
            'name' => $this->name,
            'description' => $this->description
        ]);


        // redirect()->route('services.create');
    }



    public function deleteId($id)
    {
        $service = Service::find($id);
        $this->ServiceID = $service->id;
        $this->name = $service->name;
    }

    public function delete()
    {
        $Service = Service::find($this->ServiceID);
        $Service->delete();
    }


    public function resetInput(){

    }

}