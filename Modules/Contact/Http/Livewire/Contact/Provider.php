<?php

namespace Modules\Contact\Http\Livewire\Contact;


use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Excel;
use Modules\Contact\Entities\Contact;

class Provider extends Component
{
    use WithPagination;
    public $sortColumn = 'id';
    public $sortDirection = "asc";
    public $hydrate;
    public $searchTerm = '';
    public $globalSearch = '';
    protected $listeners = [
        'searchLocal'
    ];


    public $name;
    public $last_name;
    public $gender;
    public $email;
    public $phone_home;
    public $phone_mobile;
    public $address;
    public $notes;
    public $type;
    public $ContactId;




    public function searchLocal($global)
    {
        $this->searchTerm = $global;
    }

    private function getHeaders()
    {
        return [
            'id' => 'ID',
            'name' => trans('Proveedor'),
            'last_name' => trans('Nombre Cliente'),
            'email' => trans('Email'),
            'phone_home' => trans('Telefono'),
            'phone_mobile' => trans('Celular'),
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
        return Contact::select(
            'contacts.id',
            'contacts.name',
            'contacts.last_name',
            'contacts.gender',
            'contacts.email',
            'contacts.phone_home',
            'contacts.phone_mobile',
            'contacts.address',
            'contacts.notes'
        )->where(function ($query) {
            if ($this->searchTerm != '') {
                $query->where('contacts.name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('contacts.last_name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('contacts.gender', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('contacts.email', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('contacts.phone_home', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('contacts.phone_mobile', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('contacts.address', 'like', '%' . $this->searchTerm . '%');
            }
        })->where('contacts.type', 'provider')
            ->orderBy($this->sortColumn, $this->sortDirection);
    }


    private function getUsers()
    {
        return $this->buildQuery()->paginate(10);
    }


    public function render()
    {
        return view(
            'contact::livewire.contact.provider',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
            ]
        );
    }

    public function show($id)
    {
        // redirect()->route('contact.show', $id);
    }

    public function editId($id)
    {
        $sql =  Contact::find($id);
        $this->ContactId = $id;
        $this->name = $sql->name;
        $this->last_name = $sql->last_name;
        $this->gender = $sql->gender;
        $this->email = $sql->email;
        $this->phone_home = $sql->phone_home;
        $this->phone_mobile = $sql->phone_mobile;
        $this->address = $sql->address;
        $this->notes = $sql->notes;
    }

    public function edit()
    {
        $sql =  Contact::find($this->ContactId);
        $sql->name = $this->name;
        $sql->last_name = $this->last_name;
        $sql->gender = $this->gender;
        $sql->email = $this->email;
        $sql->phone_home = $this->phone_home;
        $sql->phone_mobile = $this->phone_mobile;
        $sql->address = $this->address;
        $sql->notes = $this->notes;
        $sql->save();

    }


    public function destroy($id)
    {
        $this->emit('delete', $id);
    }

    public function add()
    {
        Contact::create([
            'name' => $this->name,
            'last_name' => $this->last_name,
            'gender' => $this->gender,
            'email' => $this->email,
            'phone_home' => $this->phone_home,
            'phone_mobile' => $this->phone_mobile,
            'address' => $this->address,
            'notes' => $this->notes,
            'type' => "provider"
        ]);




    }

    public function resetInput(){

    }



}
