<?php

namespace App\Http\Controllers;

use App\Models\Marketing;
use App\Models\MarketingCategory;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
     public function index()
    {
        $brandServices = Marketing::get();
        $marketingCategories=MarketingCategory::latest()->get();
        return view('admin/Marketing/marketing', [
            'brandService' => new Marketing(),
            'brandServices' => $brandServices,
            'marketingCategories'=>$marketingCategories
        ]);
    }

    public function store(Request $request){
        $data=$request->validate([
            'marketing_category_id'=>'required',
            'name'=>'required',
            'iframe'=>'required',
            'description'=>'nullable',
        ]);

        Marketing::create($data);

        return redirect()->back()->with('success',"New data have been saved");
    }

    public function edit(Marketing $marketing)
    {
        $brandServices = Marketing::get();
        $marketingCategories=MarketingCategory::latest()->get();
        return view('admin/Marketing/marketing', [
            'brandService' => $marketing,
            'brandServices' => $brandServices,
            'marketingCategories'=>$marketingCategories
        ]);
    }

    public function update(Request $request, Marketing $marketing){
        $data=$request->validate([
            'marketing_category_id'=>'required',
            'name'=>'required',
            'iframe'=>'required',
            'description'=>'nullable',
        ]);

        $marketing->update($data);

        return redirect()->route('marketing.index')->with('success',"Selected data have been updated");
    }

    public function delete(Marketing $marketing){
        
        $marketing->delete();

        return redirect()->route('marketing.index')->with('success',"Selected data have been removed");
    }
}
