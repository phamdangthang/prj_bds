<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    protected $fillable = [
        'name',
        'slug',
        'content',
        'status',
        'admin_id',
        'category_id',
        'logo',
    ];

    public function admin() {
        return $this->belongsTo('App\Models\Admin', 'admin_id', 'id');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}
