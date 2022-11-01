<?php

namespace Modules\Contact\Http\Livewire\Client;

use Livewire\Component;
use Modules\Contact\Entities\ContactsClient;

class InvoiceEdit extends Component
{
    public $invoice;
    public $invoice_id;
    public $contact_id;
    public $type;
    public $rif;
    public $name;
    public $phone;
    public $email;
    public $address;



    public function mount($invoice)
    {
        $this->invoice = $invoice;
        $this->invoice_id = $invoice->id;
        $this->contact_id = $invoice->contact_id;
        $this->type = $invoice->type;
        $this->rif = $invoice->rif;
        $this->name = $invoice->name;
        $this->phone = $invoice->phone;
        $this->email = $invoice->email;
        $this->address = $invoice->address;

    }



    public function render()
    {
        return view('contact::livewire.client.invoice-edit');
    }


    public function editId($id)
    {
        $this->invoice = ContactsClient::find($id);
        $this->invoice_id = $this->invoice->id;
        $this->contact_id = $this->invoice->contact_id;
        $this->type = $this->invoice->type;
        $this->rif = $this->invoice->rif;
        $this->name = $this->invoice->name;
        $this->phone = $this->invoice->phone;
        $this->email = $this->invoice->email;
        $this->address = $this->invoice->address;
    }



    public function update()
    {
        $contactsClient = ContactsClient::find($this->invoice_id);
        $contactsClient->type = $this->type;
        $contactsClient->rif = $this->rif;
        $contactsClient->name = $this->name;
        $contactsClient->phone = $this->phone;
        $contactsClient->email = $this->email;
        $contactsClient->address = $this->address;
        $contactsClient->save();
    }

}