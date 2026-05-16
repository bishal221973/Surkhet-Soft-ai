<?php

namespace App\Http\Controllers;

use App\Models\PrintCategory;
use App\Models\PrintPortfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrintPortfolioController extends Controller
{
    public function index()
    {
        $printPortfolios = PrintPortfolio::with('category')->latest()->get();
        $printServices = PrintCategory::where('status', true)->latest()->get();
        return view('admin/print/portfolio', [
            'printPortfolios' => $printPortfolios,
            'printServices' => $printServices,
            'printPortfolio' => new PrintPortfolio()
        ]);
    }

     public function store(Request $request)
    {
        $data = $request->validate([
            'print_category_id' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('brands', 'public');
        }
        $data['print_category_id'] = $data['print_category_id'];
        PrintPortfolio::create($data);
        return redirect()->back()->with('success', "New print portfolio have been created.");
    }

    public function edit($id)
    {
        $printPortfolios = PrintPortfolio::with('category')->latest()->get();
        $printServices = PrintCategory::where('status', true)->latest()->get();
        return view('admin/print/portfolio', [
            'printPortfolios' => $printPortfolios,
            'printServices' => $printServices,
            'printPortfolio' => PrintPortfolio::find($id)
        ]);
    }

     public function update(Request $request,$id)
    {
        $data = $request->validate([
            'print_category_id' => 'required',
            'name' => 'required',
            'description' => 'nullable',
            'image' => 'nullable',
        ]);


        $portfolio=PrintPortfolio::where('id', $id)->first();
        if ($request->hasFile('image')) {
            if($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
             $data['image'] = $request->file('image')->store('brands', 'public');
        }
        $data['print_category_id'] = $data['print_category_id'];
        $portfolio->update($data);
        return redirect()->route('print-design.index')->with('success', "Print portfolio have been updated.");
    }
    public function destroy($id)
    {
        
        $portfolio=PrintPortfolio::where('id', $id)->first();
            if($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
        $portfolio->delete();
        return redirect()->route('print-design.index')->with('success', "Print portfolio have been deleted.");
    }

}
