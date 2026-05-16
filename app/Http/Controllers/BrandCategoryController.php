<?php

namespace App\Http\Controllers;

use App\Models\BrandCategory;
use Illuminate\Http\Request;

class BrandCategoryController extends Controller
{
    public function index()
    {
        $brandCategories = BrandCategory::orderBy('position', 'asc')->get();
        return view('admin/brands/category', [
            'brandCategory' => new BrandCategory(),
            'brandCategories' => $brandCategories
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
        ]);

        BrandCategory::create($data);

        return redirect()->back()->with('success', "New category have been created.");
    }

    public function toggleStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $brand = BrandCategory::findOrFail($id);

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
        $brandCategory = BrandCategory::find($id);
        $brandCategories = BrandCategory::orderBy('position', 'asc')->get();
        return view('admin/brands/category', [
            'brandCategories' => $brandCategories,
            'brandCategory' => $brandCategory
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
        ]);
        $brandCategory = BrandCategory::find($id);
        // $data['is_parent'] = true;

        $brandCategory->update($data);

        return redirect()->route('brand-category.index')->with('success', "Selected category have been changed.");
    }

    public function destroy($id)
    {
        $brandCategory = BrandCategory::find($id);
        $brandCategory->delete();
        return redirect()->route('brand-category.index')->with('success', "Selected category have been removed.");
    }

    public function sort(Request $request)
    {
        foreach ($request->order as $item) {
            \App\Models\BrandCategory::where('id', $item['id'])
                ->update(['position' => $item['position']]);
        }

        return response()->json(['success' => true]);
    }
}
