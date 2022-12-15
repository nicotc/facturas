<?php

namespace Modules\Budget\Http\Livewire;

use Livewire\Component;
use Modules\Budget\Entities\GastosDetalle;
use Livewire\WithPagination;

class GastosDetalles extends Component
{

    use WithPagination;
    public $sortColumn = 'id';
    public $sortDirection = "desc";
    public $hydrate;
    public $searchTerm = '';
    public $globalSearch = '';


    public $codigoProyecto;
    public $costosId;


    public $fecha;
    public $descripcion;
    public $total;
    public $deuda;
    public $abono;
    public $nota;



    public function searchLocal($global)
    {
        $this->searchTerm = $global;
    }

    private function getHeaders()
    {

        return [
            'fecha' => "fecha",
            'descripcion' => 'descripcion',
            'abono' => 'abono',
            'nota' => 'nota'
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

        return GastosDetalle::select(
            'id',
            'fecha',
            'descripcion',
            'abono',
            'nota'
        )
            ->where(function ($query) {
                if ($this->searchTerm != '') {
                    $query->where('fecha', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('descripcion', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('abono', 'like', '%' . $this->searchTerm . '%')
                        ->orWhere('nota', 'like', '%' . $this->searchTerm . '%');
                }
            })
            ->where('gastos_id', $this->costosId)
            ->orderBy($this->sortColumn, $this->sortDirection);
    }

    private function getUsers()
    {
        return $this->buildQuery()->paginate(10);
    }

    public function render()
    {

        return view(
            'budget::livewire.gastos-detalles',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
            ]
        );
    }

    public function resetInput(){

    }


    public function cambiar()
    {

        $this->emit('cambiarDetalle');
     
    }


    public function add(){
               GastosDetalle::create([
                'gastos_id' => $this->costosId,
                'fecha' =>  $this->fecha,
                'descripcion' =>  $this->descripcion,
                'abono' =>  $this->abono,
                'nota' =>  $this->nota,
               ]);
    }

}
