<?php

namespace Modules\Users\Http\Livewire\Roles;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

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
            'guard_name' => trans('Guard Name'),
            // 'created_at' => [
            //     'label' => 'Created At',
            //     'func' => function($value) {
            //         return $value->format('d/m/Y');
            //      }
            // ]
        ];
    }

    public function sort($column)
    {
        if ($this->sortColumn == $column) {
            $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
        }
        $this->sortColumn = $column;
    }

    private function getUsers()
    {
        return Role::where(function ($query) {
            if($this->searchTerm != '') {
                $query->where('name', 'like', '%' . $this->searchTerm . '%');
            }
        })
        ->orderBy($this->sortColumn, $this->sortDirection)
        ->paginate(10);
    }


    public function render()
    {
        return view('users::livewire.roles.index', [
            'data' => $this->getUsers(),
            'headers' => $this->getHeaders(),
        ]);
    }

    public function show($id)
    {
        redirect()->route('roles.show', $id);
    }

    public function edit($id)
    {
        redirect()->route('roles.edit', $id);
    }

    public function destroy($id)
    {
        $this->emit('delete', $id);
    }

    public function add()
    {
        redirect()->route('roles.create');
    }


}