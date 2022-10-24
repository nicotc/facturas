<?php

namespace Modules\Users\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Excel;

class Index extends Component
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
            'name' => trans('Name'),
            'email' => trans('Email'),
            'rol' => trans('Role'),
        ];
    }

    public function sort($column)
    {
        if ($this->sortColumn == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        }
        $this->sortColumn = $column;
    }

    private function buildQuery(){
        return User::select('users.id', 'users.name', 'email', 'roles.name as rol' )
        ->leftJoin('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
        ->leftJoin('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->where(function ($query) {
            if($this->searchTerm != '') {
                $query->where('users.name', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('email', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('roles.name', 'like', '%' . $this->searchTerm . '%');
            }
        })
        ->orderBy($this->sortColumn, $this->sortDirection);
    }


    private function getUsers()
    {
        return $this->buildQuery()->paginate(10);

    }


    public function render()
    {
        return view('users::livewire.users.index', [
            'data' => $this->getUsers(),
            'headers' => $this->getHeaders(),
        ]);
    }

    public function show($id)
    {
        redirect()->route('users.show', $id);
    }

    public function edit($id)
    {
        redirect()->route('users.edit', $id);
    }

    public function destroy($id)
    {
        $this->emit('delete', $id);
    }

    public function add()
    {
        redirect()->route('users.create');
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