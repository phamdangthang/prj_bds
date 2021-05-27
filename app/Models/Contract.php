<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
    	'code',
    	'project_id',
    	'user_id',
    	'status',
    	'total_money',
    ];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function transactions() {
        return $this->hasMany(Transaction::class);
    }
}
