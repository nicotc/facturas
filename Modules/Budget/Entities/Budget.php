<?php

namespace Modules\Budget\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'correlative',
        'description',
        'contacts_id',
        'contacts_address_id',
        'status',
        'users_id',
    ];


    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {

            $model->users_id = auth()->user()->id;
            $budget = Budget::count();
            $budget++;
            $budget = str_pad($budget, 3, "0", STR_PAD_LEFT);
            $correlative = date('Ymd')."-".$budget;
            $model->correlative = $correlative;
            $model->status = 'pending approval';

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