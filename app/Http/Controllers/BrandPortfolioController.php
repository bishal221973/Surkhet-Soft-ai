<?php

namespace App\Http\Controllers;

use App\Models\BrandCategory;
use App\Models\BrandingService;
use App\Models\BrandPortfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandPortfolioController extends Controller
{
    public function index()
    {
        $brandPortfolios = BrandPortfolio::with('category')->latest()->get();
        $brandServices = BrandCategory::where('status', true)->orderBy('position', 'asc')->get();
        return view('admin/brands/portfolio', [
            'brandService' => new BrandingService(),
            'brandServices' => $brandServices,
            'brandPortfolios' => $brandPortfolios,
            'brandPortfolio' => new BrandPortfolio()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'branding_service_id' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('brands', 'public');
        }
        $data['brand_category_id'] = $data['branding_service_id'];
        BrandPortfolio::create($data);
        return redirect()->back()->with('success', "New brand portfolio have been created.");
    }

    public function toggleStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $brand = BrandPortfolio::findOrFail($id);

        $brand->status = $request->status;
        $brand->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'status' => $brand->status
        ]);
    }

    public function edit($id)
    {
        $brandPortfolios = BrandPortfolio::with('category')->latest()->get();
        $brandServices = BrandCategory::where('status', true)->orderBy('position', 'asc')->get();
        $brandPortfolio = BrandPortfolio::find($id);
        return view('admin/brands/portfolio', [
            'brandService' => new BrandingService(),
            'brandServices' => $brandServices,
            'brandPortfolios' => $brandPortfolios,
            'brandPortfolio' => $brandPortfolio
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'branding_service_id' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);
        $brandPortfolio = BrandPortfolio::find($id);

        $data['brand_category_id'] = $data['branding_service_id'];
        if ($request->hasFile('image')) {
            if ($brandPortfolio->image) {
                Storage::delete($brandPortfolio->image);
            }
            $data['image'] = $request->file('image')->store('brands', 'public');
        }
        // return $data;
        $brandPortfolio->update($data);
        // return $brandPortfolio;
        // $brandServices = BrandingService::where('is_parent', true)->where('status',true)->orderBy('position','asc')->get();
        return redirect()->route('brand-portfolio.index')->with('success', "Selected brand portfolio have been changed.");
    }

    public function destroy($id)
    {
        $brandPortfolio = BrandPortfolio::find($id);


        if ($brandPortfolio->image) {
            Storage::delete($brandPortfolio->image);
        }
        // return $data;
        $brandPortfolio->delete();
        // return $brandPortfolio;
        // $brandServices = BrandingService::where('is_parent', true)->where('status',true)->orderBy('position','asc')->get();
        return redirect()->route('brand-portfolio.index')->with('success', "Selected brand portfolio have been removed.");
    }
}
