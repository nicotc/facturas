<?php

namespace Modules\Budget\Http\Livewire\Budget;

use Livewire\Component;
use Modules\Budget\Entities\Budget;
use Modules\Contact\Entities\ContactsClient;

class Items extends Component
{

    public $description;
    public $quantity;


    public function render()
    {
        return view('budget::livewire.budget.items');
    }


    public function add()
    {
        dd($this->description, $this->quantity);
    }

}