<?php

namespace App\Http\Controllers;

use App\Models\MarketingCategory;
use Illuminate\Http\Request;

class MarketingCategoryController extends Controller
{
     public function index()
    {
        $brandServices = MarketingCategory::get();
        return view('admin/Marketing/category', [
            'brandService' => new MarketingCategory(),
            'brandServices' => $brandServices
        ]);
    }

    public function store(Request $request){
        $data=$request->validate([
            'name'=>'required',
            'icon'=>'nullable',
            'description'=>'nullable',
        ]);

        MarketingCategory::create($data);

        return redirect()->back()->with('success',"New category have been saved");
    }

    public function edit($id)
    {
        $marketingCategory=MarketingCategory::find($id);
        $brandServices = MarketingCategory::get();
        return view('admin/Marketing/category', [
            'brandService' => $marketingCategory,
            'brandServices' => $brandServices
        ]);
    }

    public function update(Request $request,$id){
        // return $request;
         $data=$request->validate([
            'name'=>'required',
            'icon'=>'nullable',
            'description'=>'nullable',
        ]);
        $marketingCategory=MarketingCategory::find($id);

        $marketingCategory->update($data);

        return redirect()->route('marketting-category.index')->with('success','Selected category have been changed');
        }
        
        public function destroy($id){
            $marketingCategory=MarketingCategory::find($id);
            $marketingCategory->delete();
            return redirect()->route('marketting-category.index')->with('success','Selected category have been removed');

    }
}
