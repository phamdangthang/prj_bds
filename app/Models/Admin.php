<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Http\Request;

class Admin extends Authenticatable
{
    use HasRoles;
    protected $table = 'admins';
    protected $guard_name = 'admin';
    protected $guard = 'admin';

    protected $fillable = [
        'code',
        'username',
        'avatar',
        'name',
        'email',
        'phone',
        'password',
    ];

    public function transactions () {
        return $this->hasMany(Transaction::class);
    }

    public function getRevenueAttribute()
    {
        $first_month = date('Y-m-01');
        $end_month = date('Y-m-t');

        $request = resolve(Request::class);

        $result = $this->transactions->where('status', 1);

        $result
            ->where('confirmation_date', '>=', $first_month)
            ->where('confirmation_date', '<=', $end_month);

        if (isset($request->from_date)) {
            $result = $result->where('confirmation_date', '>=', $request->from_date);
        }

        if (isset($request->to_date)) {
            $result = $result->where('confirmation_date', '<=', $request->to_date);
        }

        return $result->sum('total_money');
    }
}
