<?php

namespace Modules\Budget\Http\Livewire\Budget;

use Livewire\Component;
use Modules\Budget\Entities\Budget;
use Modules\Budget\Entities\BudgetItems;
use Modules\Contact\Entities\ContactsClient;
use Barryvdh\DomPDF\Facade\Pdf;

class Items extends Component
{

    public $description;
    public $quantity;
    public $budgetId;
    public $idItem;


    // INICIO DATA TABLE
    public $sortColumn = 'id';
    public $sortDirection = "desc";
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
            // 'id' => 'ID',
            'quantity' => trans('Cantidad'),
            'description' => trans('Descriptión'),
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

        return BudgetItems::select(
            'budget_items.id',
            'budget_items.budgets_id',
            'budget_items.description',
            'budget_items.quantity'
        )
        ->where(function ($query) {
            if ($this->searchTerm != '') {
                $query->where('description', 'like', '%' . $this->searchTerm . '%')
                    ->orWhere('quantity', 'like', '%' . $this->searchTerm . '%');
            }
        })
            ->where('budgets_id', $this->budgetId)
            ->orderBy($this->sortColumn, $this->sortDirection);
    }


    private function getUsers()
    {
        return $this->buildQuery()->paginate(10);
    }


    public function render()
    {

        return view(
            'budget::livewire.budget.items',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
            ]
        );
    }

    // FIN DATA TABLE


    // VALIDACIONES

    protected $rules = [
        'description' => 'required',
        'quantity' => 'required',
    ];


    protected $messages = [
        'description.required' => 'El campo Descripción es obligatorio',
        'quantity.required' => 'El campo Cantidad es obligatorio',
    ];


    public function resetInput()
    {
        $this->description = "";
        $this->quantity = "";
        $this->idItem = "";
        $this->resetErrorBag();
    }

    // FIN VALIDACIONES


    public function show($id)
    {
        redirect()->route('budget.showBreakdown', $id);
    }




    public function add()
    {
        $this->validate();

        BudgetItems::create([
            'budgets_id' => $this->budgetId,
            'description' => $this->description,
            'quantity' => $this->quantity,
        ]);

        $this->description = "";
        $this->quantity = "";

        $this->resetInput();
        $this->emit('create');

    }






    public function editId($id)
    {
      
        $budgetEdit = BudgetItems::find($id);
        $this->idItem = $budgetEdit->id;
        $this->description = $budgetEdit->description;
        $this->quantity = $budgetEdit->quantity;
        $this->budgetId = $budgetEdit->budgets_id;

    }


    public function edit()
    {
        $this->validate();
        $budgetEdit = BudgetItems::find($this->idItem);
        $budgetEdit->description = $this->description;
        $budgetEdit->quantity = $this->quantity;
        $budgetEdit->budgets_id = $this->budgetId;
        $budgetEdit->save();
        $this->emit('update');
        $this->resetInput();

    }



    public function deleteId($id)
    {
        // $inventario = BudgetItems::find($id);
        // $this->invetario_id = $inventario->id;
        // $this->name = $inventario->name;
    }

    public function delete()
    {
        // $inventario = Inventory::find($this->invetario_id);
        // $inventario->delete();
    }




    public function print_pdf($id)
    {

        redirect()->route('budget.print', $id);
    }


    public function abonos($id)
    {
        // dd($id);
    }
}