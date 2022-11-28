<?php

namespace Modules\Budget\Http\Livewire\Desglose;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Budget\Entities\DesgloseItems;
use Modules\Budget\Entities\DesgloseExtras;
use Modules\Budget\Entities\DesgloseDesglose;

class Extras extends Component
{

    use WithPagination;
    public $sortColumn = 'id';
    public $sortDirection = "desc";
    public $hydrate;
    public $searchTerm = '';
    public $globalSearch = '';
    public $codigoProyecto;
    public $itemsId;

    public $idDesgloseItems;
    public $cantidad;
    public $descripcion;
    public $precioBase;
    public $precioTotal;
    public $totalExtras;
    public $idDesgloseDesglose;






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
            'cantidad' => "Cantidad",
            'descripcion' => "Descripción",
            'precio_base' => "Costo Unitario",
            'precio_total' => "Costo Total"
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
        return DesgloseExtras::select(
            "id",
            "desglose_items",
            "numero_orden",
            'cantidad',
            'descripcion',
            'precio_base',
            'precio_total',
        )
            // ->join('contacts_address', 'contacts_address.id', '=', 'budgets.contacts_address_id')
            // ->join('services', 'services.id', '=', 'budgets.services_id')
            // ->where(function ($query) {
            //     if ($this->searchTerm != '') {
            //         $query->where('correlative', 'like', '%' . $this->searchTerm . '%')
            //             ->orWhere('services.name', 'like', '%' . $this->searchTerm . '%')
            //             ->orWhere('contacts_id', 'like', '%' . $this->searchTerm . '%')
            //             ->orWhere('contacts_address.address', 'like', '%' . $this->searchTerm . '%')
            //             ->orWhere('status', 'like', '%' . $this->searchTerm . '%')
            //             ->orWhere('users_id', 'like', '%' . $this->searchTerm . '%');
            //     }
            // })
            ->where('desglose_items', $this->itemsId)
            ->orderBy($this->sortColumn, $this->sortDirection);
    }

    private function getUsers()
    {
        return $this->buildQuery()->paginate(10);
    }

    public function render()
    {
        $this->Textras();
        return view(
            'budget::livewire.desglose.extras',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
            ]
        );
    }

    public function add()
    {
        DesgloseExtras::create([
            "numero_orden" => $this->codigoProyecto,
            'desglose_items' => $this->itemsId,
            'cantidad' => $this->cantidad,
            'descripcion'=> $this->descripcion,
            'precio_base' => $this->precioBase,
            'precio_total' => $this->precioTotal
        ]);
        $this->Textras();
        $this->calcularTotalProyecto();
        $this->emit('create');
    }

    public function editId($id)
    {
        $desgloseExtras = DesgloseExtras::find($id);
        $this->idDesgloseDesglose = $id;
        $this->cantidad = $desgloseExtras->cantidad;
        $this->descripcion = $desgloseExtras->descripcion;
        $this->precioBase = $desgloseExtras->precio_base;
        $this->precioTotal = $desgloseExtras->precio_total;

    }

    public function edit()
    {
        $Update = DesgloseExtras::find($this->idDesgloseDesglose);
        $Update->cantidad = $this->cantidad;
        $Update->descripcion = $this->descripcion;
        $Update->precio_base = $this->precioBase;
        $Update->precio_total = $this->precioBase * $this->cantidad;
        $Update->save();
        $this->getUsers();
        $this->Textras();
        $this->calcularTotalProyecto();
        $this->emit('update');
    }


    public function deleteId($id)
    {
        $this->descripcion = DesgloseExtras::find($id)->descripcion;
        $this->idDesgloseDesglose = $id;
    }

    public function delete()
    {
        DesgloseExtras::find($this->idDesgloseDesglose)->delete();
        $this->calcularTotalProyecto();
    }


    public function updatedcantidad()
    {
        $this->calcular();
    }

    public function updatedprecioBase()
    {
        $this->calcular();
    }

    public function cambiar($id)
    {
        $this->emit('itemId', $id);
        $this->emit('cambiarItem');
    }


    public function calcular()
    {
        if ($this->precioBase != null) {
            $this->precioTotal = $this->cantidad * $this->precioBase;
        }
    }


    public function resetInput()
    {
        $this->cantidad = "";
        $this->descripcion = "";
        $this->precioBase = "";
        $this->precioTotal = "";
    }



    public function Textras()
    {
        $this->totalExtras = DesgloseExtras::where('desglose_items', $this->itemsId)->sum('precio_total');
    }





    public function calcularTotalProyecto()
    {
        $desgloseMateriales = DesgloseDesglose::where('desglose_items', $this->itemsId)->sum('precio_total_proyectado');
        $desgloseExtras = DesgloseExtras::where('desglose_items', $this->itemsId)->sum('precio_total');
        $desgloseItems = DesgloseItems::where('id', $this->itemsId)->first();
        $sumaDesglose = $desgloseMateriales + $desgloseExtras;
        $desgloseItems->precio_unitario = $sumaDesglose;
        $desgloseItems->total = $desgloseItems->cantidad * $sumaDesglose;
        $desgloseItems->save();
        $total = DesgloseItems::where('numero_orden', $this->codigoProyecto)->sum('total');
        $this->emit("TotalCostoProyecto", $total);
    }

}