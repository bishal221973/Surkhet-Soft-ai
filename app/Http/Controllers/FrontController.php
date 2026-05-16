<?php

namespace App\Http\Controllers;

use App\Models\BrandCategory;
use App\Models\BrandingService;
use App\Models\BrandPortfolio;
use App\Models\Brands;
use App\Models\ContentCategory;
use App\Models\ContentImage;
use App\Models\Marketing;
use App\Models\MarketingCategory;
use App\Models\PrintCategory;
use App\Models\PrintPortfolio;
use App\Models\Team;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function strategy()
    {
        return view(view: 'front.strategy');
    }

    public function development()
    {
        return view(view: 'front.development');
    }

    public function brand()
    {
        $brandServices = BrandingService::where('is_parent', true)->where('status', true)->orderBy('position', 'asc')->get();
        $brandPortfolios = BrandPortfolio::with('category')->where('status', true)->latest()->get();
        $brandCategories = BrandCategory::where('status', true)->latest()->get();
        return view('front.brand', [
            'brandServices' => $brandServices,
            'brandPortfolios' => $brandPortfolios,
            'brandCategories' => $brandCategories
        ]);
    }

    public function ai()
    {
        return view(view: 'front.ai');
    }

    public function printDesign()
    {
        $categories=PrintCategory::latest()->get();
        $portfolios=PrintPortfolio::latest()->get();
        return view('front.printDesign',[
            'categories'=>$categories,
            'portfolios'=>$portfolios
        ]);
    }

    public function marketing()
    {
        $brands = Brands::latest()->get();
        $categories=MarketingCategory::latest()->get();
        $marketings=Marketing::latest()->get();
        return view('front.marketing', [
            'brands' => $brands,
            'categories'=>$categories,
            'marketings'=>$marketings,
        ]);
    }

    public function production()
    {
        $contentCategories = ContentCategory::orderBy('position', 'asc')->where('status', true)->get();
        $brands = Brands::latest()->get();
        return view('front.production', [
            'contentCategories' => $contentCategories,
            'brands' => $brands
        ]);
    }
    public function productionShow(ContentCategory $contentCategory)
    {
        return view('front.productionShow', [
            'contentCategory' => $contentCategory->load('contentImages')
        ]);
    }

    public function team()
    {
        $teams=Team::latest()->get();
        return view('front.team',[
            'teams'=>$teams
        ]);
    }
    public function collaboration()
    {
        $teams=Team::latest()->get();
        return view('front.collaboration',[
            'teams'=>$teams
        ]);
    }

    public function collaborationStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'company_name' => 'nullable',
            'company_type' => 'nullable',
            'project_type' => 'nullable',
            'budget' => 'nullable',
            'description' => 'nullable',
        ]);

        \App\Models\NeedEngine::create($request->all());

        return redirect()->route('front.collaboration')->with('success', 'Your request has been submitted successfully!');
    }

    public function partnerStore(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|max:255',
        'phone' => 'nullable|string|max:50',

        'company_name' => 'nullable|string|max:255',
        'website' => 'nullable|string|max:255',
        'industry' => 'nullable|string|max:255',
        'company_size' => 'nullable|string|max:100',

        'partnership_type' => 'nullable|string|max:100',

        'country' => 'nullable|string|max:100',
        'city' => 'nullable|string|max:100',

        'message' => 'nullable|string',
    ]);

    \App\Models\Partner::create($validated);

    return redirect()
        ->route('front.collaboration')
        ->with('success', 'Your partnership request has been submitted successfully!');
}
}
