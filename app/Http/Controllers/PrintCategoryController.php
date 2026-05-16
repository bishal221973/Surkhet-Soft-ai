<?php

namespace App\Http\Controllers;

use App\Models\PrintCategory;
use Illuminate\Http\Request;

class PrintCategoryController extends Controller
{
    public function index()
    {
        $printCategories = PrintCategory::orderBy('position', 'asc')->get();
        return view('admin/print/category', [
            'printCategory' => new PrintCategory(),
            'printCategories' => $printCategories
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
        ]);

        PrintCategory::create($data);

        return redirect()->back()->with('success', "New category have been created.");
    }

    public function toggleStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $printCategory = PrintCategory::findOrFail($id);

        $printCategory->status = $request->status;
        $printCategory->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'status' => $printCategory->status
        ]);
    }

    public function edit($id)
    {
        $printCategory = PrintCategory::find($id);
        $printCategories = PrintCategory::orderBy('position', 'asc')->get();
        return view('admin/print/category', [
            'printCategories' => $printCategories,
            'printCategory' => $printCategory
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
        ]);
        $printCategory = PrintCategory::find($id);
        // $data['is_parent'] = true;

        $printCategory->update($data);

        return redirect()->route('print-category.index')->with('success', "Selected category have been changed.");
    }

    public function destroy($id)
    {
        $printCategory = PrintCategory::find($id);
        $printCategory->delete();
        return redirect()->route('print-category.index')->with('success', "Selected category have been removed.");
    }

    public function sort(Request $request)
    {
        foreach ($request->order as $item) {
            \App\Models\PrintCategory::where('id', $item['id'])
                ->update(['position' => $item['position']]);
        }

        return response()->json(['success' => true]);
    }
}
