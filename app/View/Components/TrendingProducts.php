<?php

namespace App\View\Components;

use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TrendingProducts extends Component
{
    public $products;
    public $title;

    /**
     * Create a new component instance.
     */
    public function __construct($title = 'Trending Products', $count = 8 ) // giving default value
    {
        $this->title = $title;
        $this->products = Product::withoutGlobalScope('owner')
        ->active()
        ->latest('updated_at')
        ->take($count)  // = limit(8)
        ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.trending-products');
    }
}
