<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PrintPortfolio extends Component
{
    /**
     * Create a new component instance.
     */
    public $printCategories;
    public $printPortfolios;
    public function __construct($printCategories=[],$printPortfolios=[])
    {
        $this->printCategories=$printCategories;
        $this->printPortfolios=$printPortfolios;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.print-portfolio');
    }
}
