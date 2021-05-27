<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Contract;
use App\Models\Transaction;

class ContractController extends Controller
{
    public function index(Request $request)
    {
    	$contracts = Contract::query();

        if ($request->search) {
            $contracts = $contracts->where('code', $request->search);
        }

        $contracts = $contracts->paginate(10);

    	$data = [
    		'contracts' => $contracts,
    		'request' => $request,
    	];

    	return view('admin::contract.index', $data);
    }

    public function show(Request $request, $id)
    {
        $contract = Contract::findOrFail($id);

    	$transactions = Transaction::where('contract_id', $id);

    	if ($request->has('search')) {
            $transactions = $transactions->where('code', $request->search);
        }

        $transactions = $transactions->paginate(10);

    	$data = [
    		'contract' => $contract,
            'transactions' => $transactions,
    		'request' => $request,
    		'id' => $id,
    	];

    	return view('admin::contract.contract-detail', $data);
    }

    public function cancel($id)
    {
        $contract = Contract::findOrFail($id);

        $contract->update([
            'status' => 4
        ]);

        $contract->project->update([
            'status' => 'approved'
        ]);

        return redirect()->back()->with('alert-success', 'Hủy hợp đồng thành công!');
    }
}
