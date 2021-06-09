<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    private $customer;

    public function __construct(User $customer) {
        $this->customer = $customer;
    }

    public function index(Request $request) {
        $query = $this->customer->query();

        if ($request->has('search')) {
            $query = $query->where('name', 'like', '%'.$request->search.'%');
        }

        $customers = $query->paginate(10);

        $viewData = [
            'customers' => $customers,
            'search' => $request->search,
        ];

        return view("admin::customer.index", $viewData);
    }

    public function view($id) {
        $customer = $this->customer->findOrFail($id);
        return view('admin::customer.view', compact('customer'));
    }
}
