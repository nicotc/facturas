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

    public function searchLocal($global)
    {
        $this->searchTerm = $global;
    }

    private function getHeaders()
    {
        return [
            'id' => 'ID',
            'name' => trans('Nombre'),
            'last_name' => trans('Apellido'),
            'email' => trans('Email'),
            'phone_home' => trans('Telefono'),
            'phone_mobile' => trans('Celular')

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
        redirect()->route('contact.show', $id);
    }

    public function edit($id)
    {
        redirect()->route('contact.edit', $id);
    }

    public function destroy($id)
    {
        $this->emit('delete', $id);
    }

    public function add()
    {
        redirect()->route('contact.create');
    }

    public function exportExcel()
    {
        $data = $this->buildQuery()->get()->toArray();
        return
            Excel::create('Filename', function ($excel) {

                $excel->sheet('Sheetname', function ($sheet) {

                    $sheet->fromArray(array(
                        array('data1', 'data2'),
                        array('data3', 'data4')
                    ));
                });
            })->export('xls');
    }
}
