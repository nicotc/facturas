<?php

namespace Modules\Budget\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Budget\Entities\Gasto;

class Gastos extends Component
{

    use WithPagination;
    public $sortColumn = 'id';
    public $sortDirection = "desc";
    public $hydrate;
    public $searchTerm = '';
    public $globalSearch = '';
    public $codigoProyecto;

    public $fecha;
    public $proveedor;
    public $descripcion;
    public $total;
    public $abono;
    public $estado;
    public $nota;
    public $GastoId;



    protected $listeners = [
        'searchLocal', 'actualizapresupuesto'
    ];

    public function actualizapresupuesto()
    {
        $this->getUsers();
    }

    public function searchLocal($global)
    {
        $this->searchTerm = $global;
    }

    private function getHeaders()
    {

        return [
            'fecha' => "fecha",
            'proveedor' => "proveedor",
            'descripcion' => 'descripcion',
            'total' => 'total',
            'abono' => 'abono',
            'estado' => 'estado',
            'nota' =>'nota'

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
        return Gasto::select(
            'id',
            'numero_orden',
            'fecha',
            'proveedor',
            'descripcion',
            'total',
            'abono',
            'estado',
            'nota'
        )
            ->where(function ($query) {
                if ($this->searchTerm != '') {
                    $query->where('fecha', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('proveedor', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('descripcion', 'like', '%' . $this->searchTerm . '%')
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
            'budget::livewire.gastos',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
            ]
        );
    }

    //RUD



    public function add(){
        Gasto::create([
            'numero_orden'  =>  $this->codigoProyecto,
            'fecha'         =>  $this->fecha,
            'proveedor'     =>  $this->proveedor,
            'descripcion'   =>  $this->descripcion,
            'total' =>  $this->total,
            'abono' => $this->abono,
            'estado' => $this->estado,
            'nota' => $this->nota
        ]);
        $this->emit('create');


    }




    public function editId($id)
    {

        $update = Gasto::where('id', $id)->first();

        $this->GastoId = $id;
        $this->fecha = $update->fecha;
        $this->proveedor = $update->proveedor;
        $this->descripcion = $update->descripcion;
        $this->total = $update->total;
        $this->abono = $update->abono;
        $this->estado = $update->estado;
        $this->nota = $update->nota;

    }

    public function edit()
    {
        $update = Gasto::where('id', $this->GastoId)->first();
        $update->numero_orden  =  $this->codigoProyecto;
        $update->fecha         =  $this->fecha;
        $update->proveedor     =  $this->proveedor;
        $update->descripcion   =  $this->descripcion;
        $update->total =  $this->total;
        $update->abono = $this->abono;
        $update->estado = $this->estado;
        $update->nota = $this->nota;
        $update->save();

        $this->emit('update');

    }




    public function updatedprecioUnitario()
    {
        $this->precioTotal = $this->precioUnitario * $this->cantidad;
    }


    public function resetInput()
    {
        $this->fecha = "";
        $this->proveedor ="";
        $this->descripcion ="";
        $this->total ="";
        $this->abono ="";
        $this->estado ="";
        $this->nota ="";
    }


    public function pdf($id)
    {
        redirect()->route('budget.gastos', $id);
    }




}
