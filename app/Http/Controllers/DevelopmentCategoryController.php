<?php

namespace App\Http\Controllers;

use App\Models\DevelopmentCategory;
use Illuminate\Http\Request;

class DevelopmentCategoryController extends Controller
{
     public function index()
    {
        $developmentCategories=DevelopmentCategory::latest()->get();
        return view('admin/Development/category', [
            'developmentCategories'=>$developmentCategories,
            'developmentCategory'=>new DevelopmentCategory()
        ]);
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>'required',
            'description'=>'nullable',
        ]);

        DevelopmentCategory::create($data);

        return redirect()->back()->with('success',"New data have been saved");
    }

    public function edit(DevelopmentCategory $developmentCategory)
    {
        $developmentCategories=DevelopmentCategory::latest()->get();
        return view('admin/Development/category', [
            'developmentCategory' => $developmentCategory,
            'developmentCategories'=>$developmentCategories
        ]);
    }

    public function update(Request $request, DevelopmentCategory $developmentCategory){
        $data=$request->validate([
            'name'=>'required',
            'description'=>'nullable',
        ]);

        $developmentCategory->update($data);

        return redirect()->route('development-category.index')->with('success',"Selected data have been updated");
    }

    public function destroy(DevelopmentCategory $developmentCategory){
        
        $developmentCategory->delete();

        return redirect()->route('development-category.index')->with('success',"Selected data have been removed");
    }
}
