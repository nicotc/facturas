<?php

namespace Modules\Budget\Http\Livewire;

use Livewire\Component;
use Modules\Budget\Entities\DesgloseItems;

class Ficha extends Component
{
    public $contactClient;
    public $budget;
    public $TotalCosto;
    public $costo;


    protected $listeners = [
        'TotalCostoProyecto'
    ];

    public function TotalCostoProyecto($TotalCosto)
    {
        $this->costo = $TotalCosto;
    }

    public function render()
    {
         $this->costo = DesgloseItems::where('numero_orden', $this->budget->correlative)->sum('total');
        return view('budget::livewire.ficha');
    }
}