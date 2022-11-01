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

    public $type;
    public $sortColumn = 'id';
    public $sortDirection = "asc";
    public $hydrate;
    public $searchTerm = '';
    public $globalSearch = '';

    public $name;
    public $description;
    public $stock;
    public $stock_alert;
    public $cost;
    public $price;
    public $invetario_id;



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
            'name' => trans('Producto'),
            'description' => trans('Descripción'),
            'stock' => trans('stock'),
            'stock_alert' => trans('stock bajo'),
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
            'stock',
            'stock_alert',
            'price',
            'cost',
            'type'
        )->where(function ($query) {
            if ($this->searchTerm != '') {
                $query->where('name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('stock', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('stock_alert', 'like', '%' . $this->searchTerm . '%')
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

            'inventory::livewire.inventory.index',
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
        $this->stock = $inventario->stock;
        $this->stock_alert = $inventario->stock_alert;
        $this->cost = $inventario->cost;
        $this->price = $inventario->price;
    }


    public function update(){
        $inventario = Inventory::find($this->invetario_id);
        $inventario->name = $this->name;
        $inventario->description = $this->description;
        $inventario->stock = $this->stock;
        $inventario->stock_alert = $this->stock_alert;
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

        Inventory::create([
            'name' => $this->name,
            'description' => $this->description,
            'stock' => $this->stock,
            'stock_alert' => $this->stock_alert,
            'cost' => $this->cost,
            'price' => $this->price,
            'type' => $this->type,
        ]);

         $this->resetInput();


        // redirect()->route('inventory.create');
    }

    public function resetInput()
    {
        $this->name = null;
        $this->description = null;
        $this->stock = null;
        $this->stock_alert = null;
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