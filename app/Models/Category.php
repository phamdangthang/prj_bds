<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    protected $table = 'categories';

    protected $fillable = [
        'name',
        'slug',
        'type',
    ];

    public function projects() {
        return $this->hasMany('App\Models\Project');
    }

    public function getProjectSoldAttribute() {
        $first_month = date('Y-m-01 00:00:00');
        $end_month = date('Y-m-t 24:00:00');

        $request = resolve(Request::class);

        $result = $this->projects->where('status', 'complete')->where('updated_at', '>=', $first_month)
            ->where('updated_at', '<=', $end_month);

        if (isset($request->from_date)) {
            $result = $this->projects->where('status', 'complete')->where('updated_at', '>=', $request->from_date);
        }

        if (isset($request->to_date)) {
            $result = $this->projects->where('status', 'complete')->where('updated_at', '<=', $request->to_date);
        }

        if (isset($request->from_date) && isset($request->to_date)) {
            $result = $this->projects->where('status', 'complete')->where('updated_at', '>=', $request->from_date)->where('updated_at', '<=', $request->to_date);
        }

        return $result->count();
    }
}
