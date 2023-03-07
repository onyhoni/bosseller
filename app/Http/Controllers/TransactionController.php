<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Exports\TransactionExport;
use App\Models\Expedisi;
use App\Models\Platfrom;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Request $request)
    {

        if ($request->platform) {
            $transaction = Transaction::where('platform', $request->platform)
                ->whereBetween('created_at', [$request->startTime, date('Y-m-d', strtotime('+1 days')), $request->endTime]);
        } elseif ($request->type) {
            $transaction = Transaction::where('type', $request->type)
                ->whereBetween('created_at', [$request->startTime, date('Y-m-d', strtotime('+1 days')), $request->endTime]);
        } else {
            $transaction = new Transaction;
        }
        $transactions = $transaction->latest()->paginate(7)->withQueryString();
        return view('transaction.index', compact('transactions'))->with('i', ($request->input('page', 1) - 1) * 7);
    }

    public function show(Transaction $transaction)
    {
        $package = Packages::find($transaction->package->id);
        $transactions = Transaction::where('package_id', $transaction->package->id)->latest()->paginate(5);
        return view('transaction.show', compact('transactions', 'package'));
    }

    public function create()
    {
        $packages = Packages::get();
        $platfroms = Platfrom::get();
        $expedisis = Expedisi::get();
        return view('transaction.create', compact('packages', 'platfroms', 'expedisis'));
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'invoice' => ['required', 'unique:transactions'],
            'platform' => ['required'],
            'expedisi' => ['required'],
            'airwaybill' => ['required'],
            'consignee' => ['required'],
            'send' => ['required'],
            'package_id' => ['required'],
            'type' => ['required'],
            'qty' => ['required'],
        ]);


        DB::beginTransaction();
        try {
            $package = Packages::lockForUpdate()->find($attributes['package_id']);
            if ($attributes['type'] == 'out') {
                $stock = $package->stock - $attributes['qty'];
            } else {
                $stock = $package->stock + $attributes['qty'];
            }

            if ($stock < 0) {
                return back()->with('error', 'Failed inserting stock not enough');
            }

            Packages::where('id', $attributes['package_id'])->update(['stock' => $stock]);
            Auth::user()->transaction()->create($attributes);

            DB::commit();
            return back()->with('success', 'inserted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('erorr', 'inserted failed');
        }
    }

    public function edit(Transaction $transaction)
    {
        $packages = Packages::get();
        return view('transaction.edit', compact('transaction', 'packages'));
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            // 'invoice' => ['required', 'unique:transactions'],
            'platform' => ['required'],
            'expedisi' => ['required'],
            'airwaybill' => ['required'],
            'consignee' => ['required'],
            'send' => ['required'],
            'package_id' => ['required'],
            'type' => ['required'],
            'qty' => ['required'],
        ]);

        DB::beginTransaction();

        try {
            $package = Packages::lockForUpdate()->find($attributes['package_id']);

            if ($request->old_type == $attributes['type']) {
                if ($attributes['type'] == 'out') {
                    $stock  = $package->stock + $request->old_qty - $attributes['qty'];
                } else {
                    $stock  = $package->stock - $request->old_qty + $attributes['qty'];
                }
            } else {
                if ($attributes['type'] == 'out') {
                    $stock  = $package->stock - $request->old_qty - $attributes['qty'];
                } else {
                    $stock  = $package->stock + $request->old_qty + $attributes['qty'];
                }
            }

            if ($stock < 0) {
                return back()->with('error', 'Failed updated stock not enough');
            }

            Packages::where('id', $attributes['package_id'])->update(['stock' => $stock]);

            Transaction::where('id', $request->id)->update($attributes);
            DB::commit();
            return redirect()->to('/transaction')->with('success', 'Updated successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->to('/transaction')->with('error', 'Updated Failed');
        }
    }

    public function delete(Request $request, Transaction $transaction)
    {
        DB::beginTransaction();
        try {
            $package = Packages::lockForUpdate()->find($request->package_id);

            if ($request->type == 'out') {
                $stock = $package->stock + $request->qty;
            } else {
                $stock = $package->stock - $request->qty;
            }

            Packages::where('id', $request->package_id)->update(['stock' => $stock]);
            $transaction->delete();
            DB::commit();
            return back()->with('success', 'Deleted successfully');
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', 'Deleted Failed');
        }
    }

    public function export()
    {
        return (new TransactionExport)->download('transactions.xlsx');
    }
}
