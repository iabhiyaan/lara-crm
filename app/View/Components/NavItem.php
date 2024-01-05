<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavItem extends Component
{
    public string $menuTitle;
    public string $route;

    /**
     * Create a new component instance.
     */
    public function __construct($menuTitle, $route)
    {
        $this->menuTitle = $menuTitle;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-item');
    }
}
