<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\PackagesExport;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->name) {
            $package = Packages::where('slug', $request->name);
        } elseif ($request->size) {
            $package = Packages::where('size', $request->size);
        } elseif ($request->startTime || $request->endTime) {
            $package = Packages::whereBetween('created_at', [$request->startTime, date('Y-m-d', strtotime('+1 days', strtotime($request->endTime)))]);
        } else {
            $package = new Packages;
        }
        $packages = $package->paginate(7)->withQueryString();
        $values = Packages::select('slug', 'name', 'size')->get();
        return view('packages.index', compact('packages', 'values'))->with('i', ($request->input('page', 1) - 1) * 7);
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'unique:packages'],
            'description' => 'required',
            'size' => 'required',
            'color' => 'required',
            'account' => 'required',
            'box_number' => 'required',
            'picture' => 'image|file|max:1024',
        ]);
        Packages::create([
            'name' => $name = $request->name,
            'slug' => Str::slug($name),
            'description' => $request->description,
            'size' => $request->size,
            'color' => $request->color,
            'account' => $request->account,
            'stock' => 0,
            'box_number' => $request->box_number,
            'picture' => $request->file('picture')->store('pictures')
        ]);

        return back()->with('success', 'Insert new package successfully');
    }

    public function destroy(Request $request, Packages $packages)
    {
        $packages->delete();

        return redirect()->back()->with('success', 'deleted successfully');
    }

    public function edit(Packages $packages)
    {
        return view('packages.edit', compact('packages'));
    }
    public function update(Request $request, Packages $packages)
    {
        $request->validate([
            'name' => ['required', 'unique:packages,name,' . $packages->id],
            'description' => 'required',
            'size' => 'required',
            'color' => 'required',
            'account' => 'required',
            'box_number' => 'required',
            'picture' => 'image|file|max:1024',
        ]);

        if ($request->file('picture')) {
            Storage::delete($request->oldPicture);
            $picture = $request->file('picture')->store('pictures');
        } else {
            $picture = $request->oldPicture;
        }


        $packages->update([
            'name' => $name = $request->name,
            'slug' => Str::slug($name),
            'description' => $request->description,
            'size' => $request->size,
            'color' => $request->color,
            'account' => $request->account,
            'box_number' => $request->box_number,
            'picture' => $picture
        ]);

        return back()->with('success', 'updated successfully');
    }

    public function export()
    {
        return (new PackagesExport)->download('Packages.xlsx');
    }
}
