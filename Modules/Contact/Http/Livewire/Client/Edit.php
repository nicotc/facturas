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




    protected $rules = [
        'name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email',
        'address' => 'required',
    ];



    protected $messages = [
        'name.required' => 'El nombre es requerido',
        'last_name.required' => 'El apellido es requerido',
        'email.required' => 'El email es requerido',
        'address.required' => 'La dirección es requerida',
    ];



    public function mount($contact)
    {
        $this->name = $this->contact->name;
        $this->last_name = $this->contact->last_name;
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
        $this->validate();
        $contactos = Contact::find($this->contact->id);
        $contactos->name = $this->name;
        $contactos->last_name = $this->last_name;
        $contactos->email = $this->email;
        $contactos->phone_home = $this->phone_home;
        $contactos->phone_mobile = $this->phone_mobile;
        $contactos->address = $this->address;
        $contactos->notes = $this->notes;
        $contactos->save();
        $this->emit('contactUpdated');

    }
}