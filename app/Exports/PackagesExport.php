<?php

namespace App\Exports;

use App\Models\Packages;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class PackagesExport implements FromView, ShouldAutoSize
{
    use Exportable;

    public function view(): View
    {
        if (request()->name) {
            $package = Packages::where('slug', request()->name)
                ->whereBetween('created_at', [request()->startTime, date('Y-m-d', strtotime('+1 days')), request()->endTime]);
        } elseif (request()->size) {
            $package = Packages::where('size', request()->size)
                ->whereBetween('created_at', [request()->startTime, date('Y-m-d', strtotime('+1 days')), request()->endTime]);
        } else {
            $package = new Packages;
        }
        $packages = $package->latest()->get();
        return view('exports.packages', compact('packages'));
    }
}
