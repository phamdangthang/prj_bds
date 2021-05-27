<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'code',
        'contract_id',
        'admin_id',
        'name',
        'description',
        'percent',
        'duration',
        'total_money',
        'status',
        'confirmation_date',
    ];

    public function contract() {
        return $this->belongsTo(Contract::class);
    }
}
