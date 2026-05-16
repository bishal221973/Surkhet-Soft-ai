<?php

namespace App\Http\Controllers;

use App\Models\ContentCategory;
use App\Models\ContentImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContentImageController extends Controller
{
    public function index()
    {
        $brandServices = ContentImage::latest()->get();
        $contentCategories = ContentCategory::orderBy('position', 'asc')->where('status', true)->get();
        return view('admin/production/image', [
            'brandService' => new ContentImage(),
            'brandServices' => $brandServices,
            'contentCategories' => $contentCategories
        ]);
    }

    public function store(Request $request)
    {
        // return $request;
        $data = $request->validate([
            'content_category_id'=>'required',
            'name' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable',
            'iframe'=>'nullable'
        ]);


        if($request->hasFile('image')){
            $data['image']=$request->file('image')->store('production','public');
        }
        ContentImage::create($data);

        return back()->with('success', 'New Iimage has been saved');
    }

    public function toggleStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $brand = ContentImage::findOrFail($id);

        $brand->status = $request->status;
        $brand->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'status' => $brand->status
        ]);
    }

    public function edit(ContentImage $contentImage)
    {
        $brandServices = ContentImage::latest()->get();
        $contentCategories = ContentCategory::orderBy('position', 'asc')->where('status', true)->get();

        return view('admin/production/image', [
            'brandService' => $contentImage,
            'brandServices' => $brandServices,
            'contentCategories'=>$contentCategories,
        ]);
    }

    public function update(Request $request, $id)
    {
        $contentImage = ContentImage::findOrFail($id);

        $data = $request->validate([
            'content_category_id'=>'required',
            'name' => 'nullable',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);


        if($request->hasFile('image')){
            if($contentImage->image){
                Storage::delete($contentImage->image);
            }
            $data['image']=$request->file('image')->store('production','public');
        }

        $contentImage->update($data);

        return redirect()->route('content-image.index')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $contentImage = ContentImage::findOrFail($id);
        if($contentImage->image){
                Storage::delete($contentImage->image);
            }
        $contentImage->delete();
        return redirect()->route('content-image.index')->with('success', 'Category removed successfully');
    }
}
