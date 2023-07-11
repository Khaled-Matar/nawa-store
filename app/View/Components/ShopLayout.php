<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ShopLayout extends Component
{
    public $title;
    public $showBreadcrumb;

    /**
     * Create a new component instance.
     */
    public function __construct($title, $showBreadcrumb = true)
    {
        $this->title = $title;
        $this->showBreadcrumb = $showBreadcrumb;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.shop',[
            // 'title' => $this->title,
        ]);
    }
}
