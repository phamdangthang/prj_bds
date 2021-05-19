<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'category_id',
        'project_id',
        'city_id',
        'address',
        'price',
        'guide',
        'usage_status',
        'status',
        'acreage',
        'number_of_bedrooms',
        'number_of_toilets',
        'door_direction',
        'balcony_direction',
        'floor',
        'apartment_number',
        'user_id',
        'admin_id',
        'note',
        'date_of_delivery',
        'images',
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function admin() {
        return $this->belongsTo('App\Models\Admin', 'admin_id', 'id');
    }
}
