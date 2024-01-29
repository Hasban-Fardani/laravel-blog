<?php

namespace App\View\Components;

use Closure;
use App\Models\Category as ModelsCategory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Category extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public ModelsCategory $category, public bool $onSearch = false)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $category = $this->category;
        $onSearch = $this->onSearch;
        return view('components.category', compact('category', 'onSearch'));
    }
}
