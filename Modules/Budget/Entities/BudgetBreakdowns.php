<?php

namespace Modules\Budget\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Contact\Entities\ContactAddress;
use Modules\Inventory\Entities\Inventory;
use Modules\Services\Entities\Service;

class BudgetBreakdowns extends Model
{
    use HasFactory;

    protected  $table = "budget_breakdowns";

    protected $fillable = [
            'budgets_id',
            'budget_item_id',
            'material_id',
            'quantity',
            'cost_unit_base',
            'cost_unit_proyectado',
            'cal_base_cantidad',
            'cal_proyectado_cantidad',
            'cal_mano_obra',
            'cal_total_proyectado'
    ];



    public function getMatirialNameAttribute()
    {
        return Inventory::find($this->material_id)->name;


      //  return ContactAddress::find($this->contacts_address_id)->address;
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