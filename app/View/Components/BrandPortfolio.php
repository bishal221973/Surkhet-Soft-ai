<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BrandPortfolio extends Component
{
    /**
     * Create a new component instance.
     */
    public $brandCategories;
    public $brandPortfolios;
    public function __construct($brandCategories=[],$brandPortfolios=[])
    {
        $this->brandCategories=$brandCategories;
        $this->brandPortfolios=$brandPortfolios;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.brand-portfolio');
    }
}
