<?php

namespace Modules\Budget\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Contact\Entities\ContactAddress;
use Modules\Services\Entities\Service;

class BudgetItems extends Model
{

    protected  $table = "budget_items";

    protected $fillable = [
        'budgets_id',
        'description',
        'quantity',
    ];


    public function getcostoUnitarioAttribute(){
        $breakdowns = BudgetBreakdowns::where('budget_item_id',$this->id)->sum('cal_total_proyectado');
        $extras =   BudgetExtras::where('budget_item_id',$this->id)->sum('total');;
        return $breakdowns + $extras;
    }

    public function getTotalAttribute(){
        return  $this->costoUnitario * $this->quantity;
    }
    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {


        });

        self::created(function ($model) {
            // ... code here
        });

        self::updating(function ($model) {
            // ... code here
        });

        self::updated(function ($model) {
            // ... code here
        });

        self::deleting(function ($model) {
            // ... code here
        });

        self::deleted(function ($model) {
            // ... code here
        });
    }





}
