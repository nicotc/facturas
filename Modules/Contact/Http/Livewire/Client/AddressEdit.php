<?php

namespace Modules\Contact\Http\Livewire\Client;

use Livewire\Component;
use Modules\Contact\Entities\ContactAddress;

class AddressEdit extends Component
{

    public $caddress;
    public $arrAddress;
    public $address;
    public $address_id;
    public $addressNEW;

    public function mount($caddress)
    {
        $this->caddress = $caddress;
        $this->arrAddress = ContactAddress::where('contact_id', $this->caddress)->get();
    }


    public function render()
    {

        return view('contact::livewire.client.address-edit');
    }


    public function newId($id){

        ContactAddress::create([
            'contact_id' => $id,
            'address' =>  $this->addressNEW,
        ]);
         $this->addressNEW = '';
        $this->arrAddress = ContactAddress::where('contact_id', $this->caddress)->get();
    }

    public function editId($id){

        $addressQuery = ContactAddress::find($id);
         $this->address_id = $addressQuery->id;
         $this->address = $addressQuery->address;
    }

    public function update(){
        $address = ContactAddress::find($this->address_id);
        $address->address = $this->address;
        $address->save();
        $this->address = '';
        $this->arrAddress = ContactAddress::where('contact_id', $this->caddress)->get();
    }



}