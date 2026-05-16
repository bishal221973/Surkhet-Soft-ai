<?php

namespace App\Http\Controllers;

use App\Models\Seo;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    public function index(){
        $seo=Seo::first();
        return view('admin.setting.seo',[
            'seo'=>$seo
        ]);
    }

    public function store(Request $request){
        // return $request;

        $data=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'keywords'=>'required'
        ]);
        $seo=Seo::first();
        if($seo){
            $seo->update($data);
            return redirect()->back()->with('success','SEO settings updated successfully');
        }
        Seo::create($data);

        return redirect()->back()->with('success','SEO settings updated successfully');
        // Store SEO settings logic here
    }
}
