<?php

namespace Modules\Budget\Http\Livewire\Budget;

use Livewire\Component;
use Modules\Budget\Entities\Budget;
use Modules\Budget\Entities\BudgetBreakdowns;
use Modules\Budget\Entities\BudgetExtras;
use Modules\Budget\Entities\BudgetItems;
use Modules\Inventory\Entities\Inventory;

class Extras extends Component
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


    public $budgetItems;

    public $materialArray;
    public $funcMateriales;





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
            // 'budgets_id',
            // 'budget_item_id',
            'description' => 'Descripcion',
            'quantity' => 'Cantidad',
            'cost_unitary' => 'Costo Unitario',
            'total' => 'Total',
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




        return BudgetExtras::select(
            'budgets_id',
            'budget_item_id',
            'description',
            'quantity',
            'cost_unitary',
            'total'
        )
            ->where(function ($query) {
                if ($this->searchTerm != '') {
                    $query->where('description', 'like', '%' . $this->searchTerm . '%');
                }
            })
            ->where('budget_item_id', $this->budgetItems)
            ->orderBy($this->sortColumn, $this->sortDirection);
    }


    private function getUsers()
    {
        return $this->buildQuery()->paginate(10);
    }


    public function render()
    {
        $this->funcMateriales();


        return view(
            'budget::livewire.budget.extras',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
            ]
        );
    }




    public function add()
    {

        $budget =  BudgetItems::find($this->budgetItems)->first();
        $budget_id = $budget->budgets_id;

        BudgetBreakdowns::create([
            'budgets_id' => $budget_id,
            'budget_item_id' => $this->budgetItems,
            'material_id' => $this->material,
            'quantity' => $this->quantity,
            'cost_unit_base' => $this->costUnitBase,
            'cost_unit_proyectado' => $this->costUnitProyectado,
            'cal_base_cantidad' => $this->CalBaseCantidad,
            'cal_proyectado_cantidad' => $this->CalProyectadoCantidad,
            'cal_mano_obra' => $this->CalManoObra,
            'cal_total_proyectado' => $this->CalTotalProyectado,
        ]);


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
                $this->CalManoObra = ($this->CalBaseCantidad / 2);
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


    public function updatedmaterial()
    {
        $res_material = Inventory::where('id', $this->material)->first();
        $this->costUnitBase = $res_material->cost;
        $this->costUnitProyectado = $res_material->price;
        $this->updatedcostUnitProyectado();
    }


    public function funcMateriales()
    {
        $this->materialArray = Inventory::pluck('name', 'id');
    }




}