<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandsController extends Controller
{
    public function index()
    {
        $brandss = Brands::latest()->get();
        return view('admin.brands', [
            'brands' => $brandss,
            'brand' => new Brands()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'url' => 'nullable',
            'logo' => 'required',
        ]);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('brands', 'public');
        }
        Brands::create($data);

        return redirect()->back()->with('success', "New leading brand have been created.");
    }

    public function edit($id)
    {
        $brands = Brands::find($id);
        $brandss = Brands::latest()->get();
        return view('admin.brands', [
            'brands' => $brandss,
            'brand' => $brands
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'url' => 'nullable',
            'logo' => 'nullable',
        ]);

        $brand = Brands::find($id);
        if ($request->hasFile('logo')) {
            if ($brand->logo) {
                Storage::delete($brand->logo);
            }
            $data['logo'] = $request->file('logo')->store('brands', 'public');
        }

        $brand->update($data);

        return redirect()->route('leading-brands.index')->with('success', "Selected brand have been updated");
    }

    public function destroy($id)
    {
        $brand = Brands::find($id);
        if ($brand->logo) {
            Storage::delete($brand->logo);
        }

        $brand->delete();
        return redirect()->route('leading-brands.index')->with('success', "Selected brand have been updated");

    }
}
