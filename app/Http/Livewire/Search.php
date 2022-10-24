<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\Livewire;

class Search extends Component
{
    public $searchTerm = '';
    public function render()
    {
        $this->emit('searchLocal', $this->searchTerm);
        return view('livewire.search');
    }
}
