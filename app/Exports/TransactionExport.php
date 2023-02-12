<?php

namespace App\Exports;

use App\Models\Transaction;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Request;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class TransactionExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        if (request()->platform) {
            $transaction = Transaction::where('platform', request()->platform)
                ->whereBetween('created_at', [request()->startTime, date('Y-m-d', strtotime('+1 days')), request()->endTime]);
        } elseif (request()->type) {
            $transaction = Transaction::where('type', request()->type)
                ->whereBetween('created_at', [request()->startTime, date('Y-m-d', strtotime('+1 days')), request()->endTime]);
        } else {
            $transaction = new Transaction;
        }
        $transactions = $transaction->latest()->get();
        return view('exports.transaction', compact('transactions'));
    }
}
