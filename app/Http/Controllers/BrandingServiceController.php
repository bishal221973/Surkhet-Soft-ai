<?php

namespace App\Http\Controllers;

use App\Models\BrandingService;
use Illuminate\Http\Request;

class BrandingServiceController extends Controller
{
    public function index()
    {
        $brandServices = BrandingService::where('is_parent', true)->orderBy('position', 'asc')->get();
        return view('admin/brands/service', [
            'brandService' => new BrandingService(),
            'brandServices' => $brandServices
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);

        $data['is_parent'] = true;

        BrandingService::create($data);

        return redirect()->back()->with('success', "New category have been created.");
    }

    public function toggleStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $brand = BrandingService::findOrFail($id);

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
        $brandService = BrandingService::find($id);
        $brandServices = BrandingService::where('is_parent', true)->orderBy('position', 'asc')->get();
        return view('admin/brands/service', [
            'brandService' => new BrandingService(),
            'brandServices' => $brandServices,
            'brandService' => $brandService
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ]);
        $brandService = BrandingService::find($id);
        // $data['is_parent'] = true;

        $brandService->update($data);

        return redirect()->route('branding-services.index')->with('success', "Selected category have been changed.");
    }

    public function destroy($id)
    {
        BrandingService::where('parent_id', $id)->delete();
        $brandService = BrandingService::find($id);
        $brandService->delete();
        return redirect()->route('branding-services.index')->with('success', "Selected category have been removed.");
    }

    public function sort(Request $request)
    {
        foreach ($request->order as $item) {
            \App\Models\BrandingService::where('id', $item['id'])
                ->update(['position' => $item['position']]);
        }

        return response()->json(['success' => true]);
    }
}
