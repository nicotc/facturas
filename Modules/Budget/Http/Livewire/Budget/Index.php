<?php

namespace Modules\Budget\Http\Livewire\Budget;

use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Excel;
use Modules\Budget\Entities\Budget;
use \Illuminate\Session\SessionManager;


class Index extends Component
{
    use WithPagination;
    public $sortColumn = 'id';
    public $sortDirection = "desc";
    public $hydrate;
    public $searchTerm = '';
    public $globalSearch = '';
    public $client ="";
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
            // 'id' => 'ID',
            'correlative' => trans('correlative'),
            'description' => trans('description'),
            // 'contacts_id' => trans('contacts_id'),
            'address' => trans('address'),
            'status' => trans('status'),
            // 'users_id' => trans('users_id')
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

        return Budget::select(
            'budgets.id',
            'correlative',
            'description',
            'contacts_id',
            'contacts_address_id',
            'status',
            'users_id',
            'contacts_address.address',
        )
        ->join('contacts_address', 'contacts_address.id', '=', 'budgets.contacts_address_id')
        ->where(function ($query) {
            if ($this->searchTerm != '') {
                $query->where('correlative', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('description', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('contacts_id', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('contacts_address.address', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('status', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('users_id', 'like', '%' . $this->searchTerm . '%');
            }
        })
            ->where('contacts_id', $this->client)
            ->orderBy($this->sortColumn, $this->sortDirection);
    }


    private function getUsers()
    {
        return $this->buildQuery()->paginate(10);
    }


    public function render()
    {
        return view(

            'budget::livewire.budget.index',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
                'client' => $this->client
            ]
        );
    }

    public function show($id)
    {
        redirect()->route('budget.show', $id);
    }

    public function edit($id)
    {
        redirect()->route('budget.edit', $id);
    }

    public function destroy($id)
    {
        $this->emit('delete', $id);
    }

    public function add($client)
    {

        redirect()->route('budget.create', compact('client'));
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