<?php

namespace Modules\Budget\Http\Livewire\Budget;

use Livewire\Component;
use Modules\Budget\Entities\Budget;
use Modules\Budget\Entities\BudgetBreakdowns;
use Modules\Budget\Entities\BudgetExtras;
use Modules\Budget\Entities\Pagos;
use Modules\Budget\Entities\BudgetItems;

class Abonado extends Component
{

    public $budgetId;
    public $totalPagar;
    public $totalAbonado;

    private function getHeaders()
    {

        return [
            // 'id' => 'ID',
            'created_at' => 'Fecha',
            'amount' => trans('Abono'),
            'description' => trans('Forma de pago'),
        ];
    }




    private function buildQuery()
    {
        return Pagos::select(
            'pagos.id',
            'pagos.created_at',
            'pagos.amount',
            'pagos.description',
        )->where('budgets_id', $this->budgetId);
    }


    private function getUsers()
    {
        return $this->buildQuery()->paginate(10);
    }


    public function render()
    {
        $this->totalPagar =  $this->totalAPagar();
        $this->totalAbonado =  $this->totalPagado();

        return view(
            'budget::livewire.budget.abonado',
            [
                'data' => $this->getUsers(),
                'headers' => $this->getHeaders(),
            ]
        );
    }

    public function totalAPagar()
    {
        $total = 0;
        $BudgetItems = BudgetItems::where('budgets_id', $this->budgetId)->pluck('quantity', 'id')->toArray();
        foreach ($BudgetItems as $key => $value) {
            $BudgetBreakdowns = BudgetBreakdowns::where('budget_item_id', $key)->sum('cal_total_proyectado');
            $arrayBreakdowns[] =  $BudgetBreakdowns* $value;
            $BudgeExtras = BudgetExtras::where('budget_item_id', $key)->sum('total');
            $arrayExtras[] =  $BudgeExtras * $value;
        }
        $sumaBreakdowns = array_sum($arrayBreakdowns);
        $sumaExtras = array_sum($arrayExtras);
        $total = $sumaBreakdowns + $sumaExtras;
        return $total;
    }

    public function totalPagado()
    {
        $total = 0;
        $total = Pagos::where('budgets_id', $this->budgetId)->sum('amount');
        return $total;
    }




}