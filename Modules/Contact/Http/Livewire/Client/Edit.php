<?php

namespace Modules\Contact\Http\Livewire\Client;

use Livewire\Component;
use Modules\Contact\Entities\Contact;

class Edit extends Component
{
    public $contact;
    public $name;
    public $last_name;
    public $gender;
    public $email;
    public $phone_home;
    public $phone_mobile;
    public $address;
    public $notes;


    public function mount(Contact $contact)
    {
    $this->contact = $contact;
    $this->name = $contact->name;
    $this->last_name = $contact->last_name;
    $this->email = $this->contact->email;
    $this->phone_home = $this->contact->phone_home;
    $this->phone_mobile = $this->contact->phone_mobile;
    $this->address = $this->contact->address;
    $this->notes = $this->contact->notes;
}

    public function render()
    {
        return view('contact::livewire.client.edit');
    }

    public function editId($id)
    {
        $this->contact = Contact::find($id);
        $this->name = $this->contact->name;
        $this->last_name = $this->contact->last_name;
        $this->email = $this->contact->email;
        $this->phone_home = $this->contact->phone_home;
        $this->phone_mobile = $this->contact->phone_mobile;
        $this->address = $this->contact->address;
        $this->notes = $this->contact->notes;
    }

    public function update(){
        $contactos = Contact::find($this->contact->id);
        $contactos->name = $this->name;
        $contactos->last_name = $this->last_name;
        $contactos->email = $this->email;
        $contactos->phone_home = $this->phone_home;
        $contactos->phone_mobile = $this->phone_mobile;
        $contactos->address = $this->address;
        $contactos->notes = $this->notes;
        $contactos->save();

    }
}