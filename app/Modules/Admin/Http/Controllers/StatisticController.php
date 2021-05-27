<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Admin;

class StatisticController extends Controller
{
    public function index(Request $request)
    {
    	$admins = Admin::query();

    	if ($request->search) {
    		$admins = $admins->where('code', $request->search);
    	}

    	$admins = $admins->paginate(10);

    	$data = [
    		'admins' => $admins,
    		'request' => $request,
    	];

    	return view('admin::statistic.index', $data);
    }
}
