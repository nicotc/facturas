<?php

namespace Modules\Budget\Http\Livewire;

use Livewire\Component;

class GastosTab extends Component
{



    public function render()
    {
        return view('budget::livewire.gastos-tab');
    }

    public $codigoProyecto;
    public $mostrarCostos;
    public $costosId = "";

    protected $listeners = [
        'cambiarDetalle',
        'costosTabId'];

    public function cambiarDetalle()
    {
        if (($this->mostrarCostos == 1) or ($this->mostrarCostos == null)) {
            $this->mostrarCostos = 2;
        } else {
            $this->mostrarCostos = 1;
        }
    }

    public function costosTabId($id)
    {
        $this->costosId = $id;
    }

}
