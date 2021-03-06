<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\Contract;
use DB;
use DateTime;
use App\Http\Requests\TransactionRequest;
use App\Http\Requests\ConfirmTransactionRequest;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $transactions = Transaction::query();

        if ($request->search) {
            $transactions = $transactions->where('code', $request->search);
        }

        $transactions = $transactions->paginate(10);

        $data = [
            'transactions' => $transactions,
            'request' => $request,
        ];

        return view('admin::transaction.index', $data);
    }

    public function confirm($id)
    {
        $transaction = Transaction::findOrFail($id);

        $data = [
            'transaction' => $transaction,
        ];

        return view('admin::transaction.confirm', $data);
    }

    public function postConfirm(ConfirmTransactionRequest $request, $id)
    {
    	DB::beginTransaction();
        try {
	    	$transaction = Transaction::findOrFail($id);

            $duration = new DateTime($transaction->duration);
            $confirmation_date = new DateTime($request->confirmation_date);

            $number_day_overdue = $duration->diff($confirmation_date)->format("%r%a");
            if ($number_day_overdue > 0) {
                $transaction->update([
                    'status' => 1,
                    'confirmation_date' => new DateTime($request->confirmation_date),
                    'image' => $request->image,
                    'total_money' => $transaction->total_money + ($number_day_overdue * 0.05 / 100 * $transaction->total_money),
                ]);
            }
            else {
    	    	$transaction->update([
    	    		'status' => 1,
                    'confirmation_date' => new DateTime($request->confirmation_date),
                    'image' => $request->image,
    	    	]);
            }

	    	$total_percent = $transaction->contract->transactions->where('status', 1)->sum('percent');

	 		if ($total_percent == 100) {
	 			$transaction->contract->update([
	 				'status' => 3
	 			]);

                $transaction->contract->project->update([
                    'status' => 'complete'
                ]);
	 		}
	 		else {
	 			$transaction->contract->update([
	 				'status' => 2
	 			]);
	 		}

            DB::commit();
	    	return redirect()->route('admin.contract.contract-detail', $transaction->contract->id)->with('alert-success', 'X??c nh???n giao d???ch th??nh c??ng!');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return redirect()->back()->with('alert-error', 'X??c nh???n giao d???ch th???t b???i!');
        }
    }

    public function create($id)
    {
    	$contract = Contract::findOrFail($id);

    	$data = [
    		'id' => $id,
    		'total_money' => $contract->total_money,
    	];
    	return view('admin::transaction.create', $data);
    }

    public function edit($id)
    {
    	$dataEdit = Transaction::findOrFail($id);

    	$data = [
    		'dataEdit' => $dataEdit,
    		'total_money' => $dataEdit->contract->total_money,
    		'id' => $dataEdit->contract->id,
    	];
    	return view('admin::transaction.edit', $data);
    }

    public function store(TransactionRequest $request, $id)
    {
    	DB::beginTransaction();
        try {
        	$contract = Contract::findOrFail($id);

        	$total_percent = $contract->transactions->sum('percent');

        	if ($total_percent + $request->percent > 100) {
        		return redirect()->back()->with('alert-error', 'T???ng ph???n tr??m c??c giao d???ch tr?????c ???? ?????t t???i '.$total_percent.'%. Giao d???ch n??y kh??ng ???????c qu?? '.(100 - $total_percent).'%');
        	}

	    	$transaction = Transaction::create([
	    		'code' => 'GD',
	    		'contract_id' => $id,
                'admin_id' => $contract->project->admin_id,
	    		'name' => $request->name,
	    		'description' => $request->description,
	    		'percent' => $request->percent,
	    		'duration' => $request->duration,
	    		'total_money' => $contract->total_money * $request->percent / 100,
	    		'status' => 0,
	    	]);

	    	$transaction->update([
	    		'code' => 'GD'.$transaction->id
	    	]);

            DB::commit();
            return redirect()->route('admin.contract.contract-detail', $id)->with('alert-success', 'T???o giao d???ch th??nh c??ng!');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return redirect()->back()->with('alert-error', 'T???o giao d???ch th???t b???i!');
        }
    }

    public function update(TransactionRequest $request, $id)
    {
    	DB::beginTransaction();
        try {
        	$transaction = Transaction::findOrFail($id);
    		
    		$request['total_money'] = $transaction->contract->total_money * $request->percent / 100;

        	$total_percent = $transaction->contract->transactions->sum('percent');

        	if ($total_percent + $request->percent > 100) {
        		return redirect()->back()->with('alert-error', 'T???ng ph???n tr??m c??c giao d???ch tr?????c ???? ?????t t???i '.$total_percent.'%. Giao d???ch n??y kh??ng ???????c qu?? '.(100 - $total_percent).'%');
        	}

	    	$transaction->update($request->all());

            DB::commit();
            return redirect()->route('admin.contract.contract-detail', $transaction->contract->id)->with('alert-success', 'C???p nh???t giao d???ch th??nh c??ng!');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return redirect()->back()->with('alert-error', 'C???p nh???t giao d???ch th???t b???i!');
        }
    }

    public function destroy($id)
    {
    	DB::beginTransaction();
        try {
    		Transaction::destroy($id);

            DB::commit();
            return redirect()->back()->with('alert-success', 'X??a giao d???ch th??nh c??ng!');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
            return redirect()->back()->with('alert-error', 'X??a giao d???ch th???t b???i!');
        }
    }
}
