<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';

    protected $fillable = [
        'name',
        'slug',
        'short_content',
        'description',
        'category_id',
        'city_id',
        'address',
        'price',
        'guide',
        'usage_status',
        'status',
        'acreage',
        'number_of_bedrooms',
        'number_of_toilets',
        'building',
        'door_direction',
        'balcony_direction',
        'floor',
        'apartment_number',
        'user_id',
        'admin_id',
        'note',
        'date_of_delivery',
        'images',
        'is_hot',
    ];
    
    public function user() {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function admin() {
        return $this->belongsTo('App\Models\Admin', 'admin_id', 'id');
    }

    public function city() {
        return $this->belongsTo('App\Models\City', 'city_id', 'id');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category');
    }
}
