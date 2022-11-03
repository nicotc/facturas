<?php

namespace Modules\Budget\Http\Livewire\Budget;

use Livewire\Component;
use Modules\Budget\Entities\BudgetItems;
use Modules\Inventory\Entities\Inventory;

class Breakdown extends Component
{

    public $material;
    public $quantity;
    public $costUnitBase;
    public $costUnitProyectado;
    public $CalBaseCantidad;
    public $CalProyectadoCantidad;
    public $CalManoObra;
    public $CalTotalProyectado;
    public $Calcular;




    public $materialArray;
    public $funcMateriales;

    public $budgetId;




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
        $this->funcMateriales();


        return view('budget::livewire.budget.breakdown',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
            ]
        );
    }




    public function add()
    {

        BudgetItems::create([
            'budgets_id' => $this->budgetId,
            'description' => $this->description,
            'quantity' => $this->quantity,
        ]);

        $this->description = "";
        $this->quantity = "";

        $this->getUsers();
        // dd($this->budgetId , $this->description, $this->quantity);


    }


    public function show($id)
    {
        redirect()->route('budget.showBreakdown', $id);
    }

    public function updatedquantity()
    {
        if ($this->quantity != null) {
            if ($this->costUnitBase != null) {
                $this->CalBaseCantidad = $this->quantity * $this->costUnitBase;
                $this->CalManoObra =($this->CalBaseCantidad/2);
            }
            if ($this->costUnitProyectado != null) {
                $this->CalProyectadoCantidad = $this->quantity * $this->costUnitProyectado;
                $this->CalTotalProyectado = $this->CalProyectadoCantidad + $this->CalManoObra;
            }
        }
    }

    public function updatedcostUnitBase()
    {
        if ($this->quantity != null) {
            if ($this->costUnitBase != null) {
                $this->CalBaseCantidad = $this->quantity * $this->costUnitBase;
                $this->CalManoObra = ($this->CalBaseCantidad / 2);
            }
        }
    }

    public function updatedcostUnitProyectado()
    {
        if ($this->quantity != null) {
            if ($this->costUnitBase != null) {
                $this->CalBaseCantidad = $this->quantity * $this->costUnitBase;
                $this->CalManoObra = ($this->CalBaseCantidad / 2);
            }
            if ($this->costUnitProyectado != null) {
                $this->CalProyectadoCantidad = $this->quantity * $this->costUnitProyectado;
                $this->CalTotalProyectado = $this->CalProyectadoCantidad + $this->CalManoObra;
            }
        }
    }


    public function updatedmaterial(){
       $res_material = Inventory::where('id', $this->material)->first();
         $this->costUnitBase = $res_material->cost;
         $this->costUnitProyectado = $res_material->price;
        $this->updatedcostUnitProyectado();

    }


    public function funcMateriales(){
       $this->materialArray = Inventory::pluck('name', 'id');
    }






}