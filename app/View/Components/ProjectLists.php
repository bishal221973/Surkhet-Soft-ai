<?php

namespace App\View\Components;

use App\Models\DevelopmentCategory;
use App\Models\DevelopmentProject;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProjectLists extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories=DevelopmentCategory::latest()->get();
        $projects=DevelopmentProject::with('category')->latest()->get();
        return view('components.project-lists', compact('categories', 'projects'));
    }
}
