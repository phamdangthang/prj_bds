<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Contract;

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

    public function categoryStatistic(Request $request)
    {
        $categories = Category::where('type', 0);

        if ($request->search) {
            $categories = $categories->where('name', 'like', '%'.$request->search.'%');
        }

        $categories = $categories->paginate(10);

        $data = [
            'categories' => $categories,
            'request' => $request,
        ];

        return view('admin::statistic.category', $data);
    }

    public function overdueContracttStatistic(Request $request)
    {
        $contracts = Contract::whereHas('transactions', function ($query) {
            $today = date('Y-m-d');
            $query->where('status', 0)->where('duration', '<', $today);
        });

        if ($request->from_date) {
            $contracts = $contracts->whereHas('transactions', function ($query) use ($request) {
                $query->where('duration', '>=', $request->from_date);
            });
        }

        if ($request->to_date) {
            $contracts = $contracts->whereHas('transactions', function ($query) use ($request) {
                $query->where('duration', '<=', $request->to_date);
            });
        }

        $contracts = $contracts->paginate(10);

        $data = [
            'contracts' => $contracts,
            'request' => $request,
        ];

        return view('admin::statistic.overdue-contract', $data);
    }
}
