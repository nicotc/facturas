<?php

namespace Modules\Budget\Http\Livewire\Desglose;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Budget\Entities\Presupuesto;
use Modules\Budget\Entities\DesgloseItems;
use Modules\Budget\Entities\DesgloseExtras;
use Modules\Budget\Entities\DesgloseDesglose;


class Items extends Component
{

    use WithPagination;
    public $sortColumn = 'id';
    public $sortDirection = "desc";
    public $hydrate;
    public $searchTerm = '';
    public $globalSearch = '';
    public $codigoProyecto;
    public $idDesgloseItems;
    public $descripcion;
    public $area;
    public $cantidad;



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

            'descripcion' => "Descripción",
            'area' => "Area",
            'cantidad' => "Cantidad",
            'precio_unitario' => "Costo Unitario",
            'total' => "Costo Total"
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
        return DesgloseItems::select(
                "desglose_items.id",
                "desglose_items.numero_orden",
                "desglose_items.descripcion",
                "desglose_items.area",
                "desglose_items.cantidad",
                "desglose_items.precio_unitario",
                "desglose_items.total"
            )
            ->where(function ($query) {
                if ($this->searchTerm != '') {
                    $query->where('descripcion', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('area', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('cantidad', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('precio_unitario', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('total', 'like', '%' . $this->searchTerm . '%');
                }
            })
             ->where('numero_orden', $this->codigoProyecto)
            ->orderBy($this->sortColumn, $this->sortDirection);
    }

    private function getUsers()
    {
        return $this->buildQuery()->paginate(10);
    }

    public function render()
    {

        return view(
            'budget::livewire.desglose.items',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
            ]
        );
    }




    // CRUD

    public function add()
    {
        $DesgloseItems = DesgloseItems::create([
            "numero_orden" => $this->codigoProyecto,
            "descripcion" => $this->descripcion,
            "area" =>  $this->area,
            "cantidad" =>  $this->cantidad,
        ]);

        Presupuesto::create([
        'desglose_items' => $DesgloseItems->id,
        'numero_orden' => $DesgloseItems->numero_orden,
        'descripcion' => $DesgloseItems->descripcion,
        'area' => $DesgloseItems->area,
        'cantidad' => $DesgloseItems->cantidad,
        'precio_unitario' => 0,
        'total' => 0
        ]);

        $this->emit('actualizapresupuesto');

        $this->emit('create');
    }

    public function editId($id)
    {
        $desgloseItems = DesgloseItems::find($id);
        $this->idDesgloseItems = $id;
        $this->descripcion = $desgloseItems->descripcion;
        $this->area = $desgloseItems->area;
        $this->cantidad = $desgloseItems->cantidad;

    }

    public function edit()
    {
         $Update = DesgloseItems::find($this->idDesgloseItems);
         $Update->descripcion = $this->descripcion;
         $Update->area = $this->area;
         $Update->cantidad = $this->cantidad;
         $Update->save();


        Presupuesto::where('desglose_items', $Update->id)
        ->update([
            'descripcion' => $Update->descripcion,
            'area' => $Update->area,
            'cantidad' => $Update->cantidad
        ]);
        $this->emit('actualizapresupuesto');
         $this->getUsers();
        $this->calcularTotalProyecto();

         $this->emit('update');
    }


    public function deleteId($id)
    {
        $this->descripcion = DesgloseItems::find($id)->descripcion;
        $this->idDesgloseItems = $id;
    }

    public function delete()
    {

        DesgloseExtras::where('desglose_items', $this->idDesgloseItems)->delete();
        DesgloseDesglose::where('desglose_items', $this->idDesgloseItems)->delete();
        Presupuesto::where('desglose_items', $this->idDesgloseItems)->delete();
        $this->emit('actualizapresupuesto');
        DesgloseItems::find($this->idDesgloseItems)->delete();
        $this->calcularTotalProyecto();
    }




    public function cambiar($id)
    {
        $this->emit('itemId', $id);
        $this->emit('cambiarItem');
    }

    public function resetInput()
    {
        $this->descripcion = "";
        $this->area = "";
        $this->cantidad = "";
    }





    // //Total Proyecto

    public function calcularTotalProyecto()
    {
        $desgloseMateriales = DesgloseDesglose::where('desglose_items', $this->idDesgloseItems)->sum('precio_total_proyectado');
        $desgloseExtras = DesgloseExtras::where('desglose_items', $this->idDesgloseItems)->sum('precio_total');
        $desgloseItems = DesgloseItems::where('id', $this->idDesgloseItems)->first();
        if ($desgloseItems != null) {
            $sumaDesglose = $desgloseMateriales + $desgloseExtras;
            $desgloseItems->precio_unitario = $sumaDesglose;
            $desgloseItems->total = $desgloseItems->cantidad * $sumaDesglose;
            $desgloseItems->save();
        }
        $total = DesgloseItems::where('numero_orden', $this->codigoProyecto)->sum('total');
        $this->emit("TotalCostoProyecto", $total);
    }


}