<?php

namespace Modules\Budget\Http\Livewire\Budget;

use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Excel;
use Modules\Budget\Entities\Budget;
use Modules\Services\Entities\Service;
use \Illuminate\Session\SessionManager;
use Modules\Contact\Entities\ContactAddress;


class Index extends Component
{
    use WithPagination;
    public $sortColumn = 'id';
    public $sortDirection = "desc";
    public $hydrate;
    public $searchTerm = '';
    public $globalSearch = '';
    public $client ="";
    public $address ="";
    public $contactAdddress;
    public $serviceModel;
    public $addressModel;
    public $serviceModelArray;
    public $addressModelArray;
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
            'correlative' => trans('# De Presupuesto'),
            'service_name' => trans('Tipo de servicio'),
            // 'contacts_id' => trans('contacts_id'),
            'address' => trans('Dirección de la obra'),
            'status' => trans('Estado del presupuesto'),
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
            'budgets.services_id',
            'contacts_id',
            'contacts_address_id',
            'status',
            'users_id',
            'contacts_address.address',
            'services.name as service_name',
        )
        ->join('contacts_address', 'contacts_address.id', '=', 'budgets.contacts_address_id')
        ->join('services', 'services.id', '=', 'budgets.services_id')
        ->where(function ($query) {
            if ($this->searchTerm != '') {
                $query->where('correlative', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('service_name', 'like', '%' . $this->searchTerm . '%')
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
        $this->serviceModelArray =  $this->service();
        $this->addressModelArray =  $this->address();
        return view(
            'budget::livewire.budget.index',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
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

    public function add()
    {
        Budget::create([
            'services_id' => $this->serviceModel,
            'contacts_id' => $this->client,
            'contacts_address_id' => $this->addressModel,
        ]);
        $this->serviceModel = '';
        $this->addressModel = '';
        //redirect()->route('budget.create', compact('client'));
    }

    public function address(){
      return   ContactAddress::where('contact_id', $this->client)->pluck('address', 'id');
    }

    public function service(){
        return  Service::pluck('name', 'id');
    }


}
