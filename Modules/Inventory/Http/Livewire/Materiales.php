<?php

namespace Modules\Inventory\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Excel;
use Modules\Contact\Entities\Contact;
use Modules\Inventory\Entities\Inventory;


class Materiales extends Component
{

    use WithPagination;

    public $type;
    public $sortColumn = 'id';
    public $sortDirection = "asc";
    public $hydrate;
    public $searchTerm = '';
    public $globalSearch = '';

    public $name;
    public $description;
    public $cost;
    public $price;
    public $invetario_id;



    protected $listeners = [
        'searchLocal'
    ];




    protected $rules = [
        'name' => 'required',
        'description' => 'required',
        'cost' => 'required',
        'price' => 'required',
    ];


    protected $messages = [
        'name.required' => 'El nombre es requerido',
        'description.required' => 'La descripción es requerida',
        'cost.required' => 'El costo es requerido',
        'price.required' => 'El precio es requerido',
    ];



    public function searchLocal($global)
    {
        $this->searchTerm = $global;
    }

    private function getHeaders()
    {
        return [
            'name' => trans('Producto'),
            'description' => trans('Descripción'),
            'cost' => trans('costo'),
            'price' => trans('precio venta'),
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
            'price',
            'cost',
            'type'
        )->where(function ($query) {
            if ($this->searchTerm != '') {
                $query->where('name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('price', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('cost', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('type', 'like', '%' . $this->searchTerm . '%');
            }
        })->where('type', $this->type)
            ->orderBy($this->sortColumn, $this->sortDirection);
    }


    private function getUsers()
    {
        return $this->buildQuery()->paginate(10);
    }


    public function render()
    {
        return view(

            'inventory::livewire.materiales',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
            ]
        );
    }

    public function show($id)
    {
        dd($id);
        // redirect()->route('inventory.show', $id);
    }

    public function editId($id)
    {
        $inventario = Inventory::find($id);
        $this->invetario_id = $id;
        $this->name = $inventario->name;
        $this->description = $inventario->description;
        $this->cost = $inventario->cost;
        $this->price = $inventario->price;
    }


    public function update()
    {
        $inventario = Inventory::find($this->invetario_id);
        $inventario->name = $this->name;
        $inventario->description = $this->description;
        $inventario->stock = 0;
        $inventario->stock_alert = 0;
        $inventario->cost = $this->cost;
        $inventario->price = $this->price;
        $inventario->save();
        $this->resetInput();
    }

    public function destroy($id)
    {
        $this->emit('delete', $id);
    }

    public function add()
    {


        $this->validate();

        $inventario =  Inventory::create([
            'name' => $this->name,
            'description' => $this->description,
            'stock' => 0,
            'stock_alert' => 0,
            'cost' => $this->cost,
            'price' => $this->price,
            'type' => $this->type,
        ]);

        $this->resetInput();
        $this->emit('create');
    }

    public function resetInput()
    {
        $this->name = null;
        $this->description = null;
        $this->cost = null;
        $this->price = null;
    }

    public function deleteId($id)
    {
        $inventario = Inventory::find($id);
        $this->invetario_id = $inventario->id;
        $this->name = $inventario->name;
    }

    public function delete()
    {
        $inventario = Inventory::find($this->invetario_id);
        $inventario->delete();
    }


}