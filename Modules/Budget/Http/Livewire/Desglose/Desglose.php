<?php

namespace Modules\Budget\Http\Livewire\Desglose;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Budget\Entities\DesgloseItems;
use Modules\Budget\Entities\DesgloseExtras;
use Modules\Budget\Entities\DesgloseDesglose;


class Desglose extends Component
{
    use WithPagination;
    public $sortColumn = 'id';
    public $sortDirection = "desc";
    public $hydrate;
    public $searchTerm = '';
    public $globalSearch = '';

    public $codigoProyecto;
    public $itemsId;
    public $desglose;
    public $cantidad;
    public $material;
    public $descripcion;
    public $precioBase;
    public $precioTotal;
    public $precioBaseProyectado;
    public $precioTotalProyectado;
    public $totalMaterial;
    public $idDesgloseDesglose;

    protected $listeners = ['searchLocal'];

    public function searchLocal($global){
        $this->searchTerm = $global;
    }

    private function getHeaders(){
        return [
            'cantidad' => 'Cantidad',
            'material' => 'Material',
            'descripcion' => 'Descripción',
            'precio_base' => 'Precio Base',
            'precio_total' => 'Precio Total',
            'precio_base_proyectado' => 'Precio Base Proyectado',
            'precio_total_proyectado' => 'Precio Total Proyectado'
        ];
    }

    public function sort($column){
        if ($this->sortColumn == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        }
        $this->sortColumn = $column;
    }

    private function buildQuery(){
        return DesgloseDesglose::select(
            'id',
            'numero_orden',
            'desglose_items',
            'cantidad',
            'material',
            'descripcion',
            'precio_base',
            'precio_total',
            'precio_base_proyectado',
            'precio_total_proyectado',
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

    private function getUsers(){
        return $this->buildQuery()->paginate(10);
    }

    public function render(){
        $this->Tmaterial();
        $this->desglose = DesgloseItems::find($this->itemsId);

        return view(
            'budget::livewire.desglose.desglose',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
            ]
        );
    }


    public function cambiar(){
        $this->emit('cambiarItem');
    }



    protected $rules = [
        'descripcion' => 'required',
        'material' => 'required',
        'cantidad' => 'required',
        'precioBase' => 'required',
        'precioBaseProyectado' => 'required',

    ];


    protected $messages = [
        'descripcion.required' => 'El campo Descripción es obligatorio',
        'material.required' => 'El campo material es obligatorio',
        'cantidad.required' => 'El cantidad es un campo obligatorio',
        'precioBase.required' => 'El precioBase es un campo obligatorio',
        'precioBaseProyectado.required' => 'El precioBaseProyectado es un campo obligatorio',
    ];








    public function add(){
        $this->validate();
        DesgloseDesglose::create([
            'desglose_items' => $this->itemsId,
            "numero_orden" => $this->codigoProyecto,
            'cantidad' => $this->cantidad,
            'material' => $this->material,
            'descripcion' => $this->descripcion,
            'precio_base' => $this->precioBase,
            'precio_total' => $this->precioBase*$this->cantidad,
            'precio_base_proyectado' => $this->precioBaseProyectado,
            'precio_total_proyectado' => $this->precioBaseProyectado*$this->cantidad
        ]);
        $this->Tmaterial();
        $this->calcularTotalProyecto();
        $this->emit('create');
    }


    public function editId($id){
        $desgloseDesglose = DesgloseDesglose::find($id);
        $this->idDesgloseDesglose = $id;
        $this->cantidad = $desgloseDesglose->cantidad;
        $this->material = $desgloseDesglose->material;
        $this->descripcion = $desgloseDesglose->descripcion;
        $this->precioBase = $desgloseDesglose->precio_base;
        $this->precioTotal = $desgloseDesglose->precio_total;
        $this->precioBaseProyectado = $desgloseDesglose->precio_base_proyectado;
        $this->precioTotalProyectado = $desgloseDesglose->precio_total_proyectado;

    }

    public function edit(){
        $this->validate();
        $Update = DesgloseDesglose::find($this->idDesgloseDesglose);
        $Update->cantidad = $this->cantidad;
        $Update->material = $this->material;
        $Update->descripcion = $this->descripcion;
        $Update->precio_base = $this->precioBase;
        $Update->precio_total = $this->precioBase*$this->cantidad;
        $Update->precio_base_proyectado = $this->precioBaseProyectado;
        $Update->precio_total_proyectado = $this->precioBaseProyectado*$this->cantidad;
        $Update->save();
        $this->getUsers();
        $this->Tmaterial();
        $this->calcularTotalProyecto();
        $this->emit('update');
    }


    public function deleteId($id){
        $this->descripcion = DesgloseDesglose::find($id)->descripcion;
        $this->idDesgloseItems = $id;
    }

    public function delete(){
        DesgloseDesglose::find($this->idDesgloseItems)->delete();
        $this->Tmaterial();
        $this->calcularTotalProyecto();
    }


    public function resetInput(){
        $this->cantidad = 1;
        $this->material = "";
        $this->descripcion = "";
        $this->precioBase = "";
        $this->precioTotal = "";
        $this->precioBaseProyectado = "";
        $this->precioTotalProyectado = "";
        $this->resetErrorBag();
    }


    public function Tmaterial(){
        $this->totalMaterial = DesgloseDesglose::where('desglose_items', $this->itemsId)->sum('precio_total_proyectado');
    }


    public function updatedcantidad(){
        $this->calcular();
    }

    public function updatedprecioBase(){
        $this->calcular();
    }

    public function updatedprecioBaseProyectado(){
        $this->calcular();
    }

    public function calcular(){
        if ($this->precioBase != null) {
            $this->precioTotal = $this->cantidad * $this->precioBase;
        }
        if ($this->precioBaseProyectado != null) {
            $this->precioTotalProyectado = $this->cantidad * $this->precioBaseProyectado;
        }
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