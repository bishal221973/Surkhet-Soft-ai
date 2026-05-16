<?php

namespace App\Http\Controllers;

use App\Models\ContentCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContentCategoryController extends Controller
{
    function generateUniqueSlug($model, $field, $value, $ignoreId = null)
    {
        $slug = Str::slug($value);
        $originalSlug = $slug;
        $count = 1;

        while (
            $model::where($field, $slug)
            ->when($ignoreId, function ($query) use ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            })
            ->exists()
        ) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }
    public function index()
    {
        $brandServices = ContentCategory::orderBy('position', 'asc')->get();
        return view('admin/production/category', [
            'brandService' => new ContentCategory(),
            'brandServices' => $brandServices
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'content_type'=>'required',
            'description' => 'nullable',
        ]);

        $data['slug'] = $this->generateUniqueSlug(ContentCategory::class, 'slug', $data['name']);

        ContentCategory::create($data);

        return back()->with('success', 'New category has been saved');
    }

    public function toggleStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|boolean',
        ]);

        $brand = ContentCategory::findOrFail($id);

        $brand->status = $request->status;
        $brand->save();

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully',
            'status' => $brand->status
        ]);
    }

    public function edit(ContentCategory $contentCategory)
    {
        $brandServices = ContentCategory::orderBy('position', 'asc')->get();
        return view('admin/production/category', [
            'brandService' => $contentCategory,
            'brandServices' => $brandServices
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = ContentCategory::findOrFail($id);

        $data = $request->validate([
            'name' => 'required',
            'content_type'=>'required',
            'description' => 'nullable',
        ]);

        // Generate unique slug (ignore current record)
        $data['slug'] = $this->generateUniqueSlug(
            ContentCategory::class,
            'slug',
            $data['name'],
            $id // pass current ID
        );

        $category->update($data);

        return redirect()->route('content-category.index')->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = ContentCategory::findOrFail($id);
        $category->delete();
        return redirect()->route('content-category.index')->with('success', 'Category removed successfully');
    }
}
