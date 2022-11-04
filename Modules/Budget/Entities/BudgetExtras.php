<?php

namespace Modules\Budget\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Contact\Entities\ContactAddress;
use Modules\Services\Entities\Service;

class BudgetExtras extends Model
{
    use HasFactory;

    protected  $table = "budget_extras";

    protected $fillable = [
            'budgets_id',
            'budget_item_id',
            'description',
            'quantity',
            'cost_unitary',
            'total'
    ];


    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            // ... code here
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

    // public function contact()
    // {
    //     return $this->belongsTo('Modules\Contact\Entities\Contact', 'contacts_id');
    // }

    // public function contact_address()
    // {
    //     return $this->belongsTo('Modules\Contact\Entities\ContactAddress', 'contacts_address_id');
    // }

    // public function user()
    // {
    //     return $this->belongsTo('Modules\User\Entities\User', 'users_id');
    // }




}