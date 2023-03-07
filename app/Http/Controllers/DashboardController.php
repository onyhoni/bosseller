<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function show()
    {
        $data = [
            'total' => Transaction::where("type", 'in')->pluck('qty')->sum() - Transaction::where("type", 'out')->pluck('qty')->sum(),
            'inTrans' => Transaction::where("type", 'in')->pluck('qty')->sum(),
            'outTrans' => Transaction::where("type", 'out')->pluck('qty')->sum(),
            'Transaction' => [
                'created' => Transaction::select(DB::raw("created_at, DATE_FORMAT(created_at, '%d %M') as created"))
                    ->whereBetween('created_at', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d', strtotime('+1 da   ys'))])
                    ->groupBy('created_at')->orderBy('created_at', 'asc')->pluck('created'),
                'qty_in' => Transaction::select(DB::raw("created_at , DATE_FORMAT(created_at, '%d %M') as created  , SUM(IF( TYPE = 'in', qty, 0)) AS qtin"))
                    ->whereBetween('created_at', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d', strtotime('+1 days'))])
                    ->groupBy('created_at')->orderBy('created_at', 'asc')->pluck('qtin'),
                'qty_out' => Transaction::select(DB::raw("created_at, DATE_FORMAT(created_at, '%d %M') as created , SUM(IF( TYPE = 'out', qty, 0)) AS qtout"))
                    ->whereBetween('created_at', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d', strtotime('+1 days'))])
                    ->groupBy('created_at')->orderBy('created_at', 'asc')->pluck('qtout'),
            ],
            'Platform' => [
                'label' => Transaction::select(DB::raw('platform , sum(qty)'))
                    ->where('type', 'out')
                    ->whereBetween('created_at', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d', strtotime('+1 days'))])
                    ->groupBy('platform')->pluck('platform'),
                'qty' => Transaction::select(DB::raw('platform , sum(qty) as qty'))
                    ->where('type', 'out')
                    ->whereBetween('created_at', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d', strtotime('+1 days'))])
                    ->groupBy('platform')->pluck('qty'),
            ],
            'Top5' =>   Packages::select('name', 'stock')
                ->whereBetween('created_at', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d', strtotime('+1 days'))])
                ->orderBy('stock', 'desc')->limit(5)->get(),
            'Down5' => Packages::select('name', 'stock')
                ->whereBetween('created_at', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d', strtotime('+1 days'))])
                ->orderBy('stock', 'asc')->limit(5)->get(),
            'Stock' => Transaction::select(DB::raw("package_id ,
                        SUM(IF( TYPE = 'in', qty, 0)) AS qtin ,
                        SUM(IF( TYPE = 'out', qty, 0)) AS qtout,
                        100 - FLOOR((SUM(IF( TYPE = 'out', qty, 0)) / SUM(IF( TYPE = 'in', qty, 0)) * 100) )  as per"))
                ->whereBetween('created_at', [date('Y-m-d', strtotime('-6 days')), date('Y-m-d', strtotime('+1 days'))])->groupBy('package_id')->orderBy('per', 'desc')->limit(5)->get()
        ];
        return $data;
    }
}
