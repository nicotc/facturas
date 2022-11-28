<?php

namespace Modules\Budget\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Budget\Entities\Abono;
use Illuminate\Support\Facades\Storage;
use Modules\Budget\Entities\Presupuesto;
use Modules\Budget\Entities\DesgloseItems;

class Abonado extends Component
{

    use WithPagination;

    public $sortColumn = 'id';
    public $sortDirection = "desc";
    public $hydrate;
    public $searchTerm = '';
    public $globalSearch = '';
    public $codigoProyecto;

    public $abonoId;
    public $fecha;
    public $descripcion;
    public $abonado;
    public $formaPago;
    public $numeroReferencia;

    protected $listeners = [
        'searchLocal'
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
            'fecha' => 'Fecha',
            'descripcion' => "Concepto",
            'abonado' => "Abonado",
            'forma_pago' => "Forma de pago",
            'numero_referencia' => "Numero de Referencia"
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
        return Abono::select(
            'id',
            'fecha',
            'numero_orden',
            'descripcion',
            'abonado',
            'forma_pago',
            'numero_referencia'
        )
            ->where(function ($query) {
                if ($this->searchTerm != '') {
                    $query->where('fecha', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('descripcion', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('abonado', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('forma_pago', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('numero_referencia', 'like', '%' . $this->searchTerm . '%');
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
            'budget::livewire.abonado',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
            ]
        );
    }

    //RUD


    public function add()
    {

        Abono::create([
            'fecha' => $this->fecha,
            'numero_orden' => $this->codigoProyecto,
            'descripcion' => $this->descripcion,
            'abonado' => $this->abonado,
            'forma_pago'=>  $this->formaPago,
            'numero_referencia' => $this->numeroReferencia
        ]);
    }



    public function editId($id)
    {
       $abono =  Abono::where('id', $id)->first();
        $this->abonoId = $id;
        $this->fecha = $abono->fecha;
        $this->descripcion = $abono->descripcion;
        $this->abonado = $abono->abonado;
        $this->formaPago = $abono->forma_pago;
        $this->numeroReferencia = $abono->numero_referencia;
    }

    public function edit()
    {
        $abono =  Abono::where('id', $this->abonoId)->first();
        $abono->fecha = $this->fecha;
        $abono->descripcion = $this->descripcion;
        $abono->abonado = $this->abonado;
        $abono->forma_pago =  $this->formaPago;
        $abono->numero_referencia = $this->numeroReferencia;
        $abono->save();
    }






    public function resetInput()
    {
    $this->fecha = "";
    $this->descripcion = "";
    $this->abonado = "";
    $this->formaPago = "";
    $this->numeroReferencia = "";
    }


    public function pdf($id)
    {
        // dd($id, $code);
    //  redirect('/budget/abono/'. $id."/" . $code);
        redirect()->route('budget.abono', $id);
    }







}