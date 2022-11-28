<?php

namespace Modules\Budget\Http\Livewire\Desglose;

use Livewire\Component;

class Tab extends Component
{
    public $codigoProyecto;
    public $mostrarItemsDesglose;
    public $itemsId = "";

    protected $listeners = ['cambiarItem', 'itemId'];

    public function render()
    {
        return view('budget::livewire.desglose.tab');
    }


    public function cambiarItem()
    {
        if(($this->mostrarItemsDesglose == 1) or ($this->mostrarItemsDesglose == null)){
            $this->mostrarItemsDesglose = 2;
        }else{
            $this->mostrarItemsDesglose = 1;
        }
    }

    public function itemId($id){
        $this->itemsId = $id;
    }
}