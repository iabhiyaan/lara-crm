<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ExpandableNavItem extends Component
{
    public string $menuTitle;
    public string $viewRole;
    public string $alterRole;
    public string $listRoute;
    public string $createRoute;

    /**
     * Create a new component instance.
     */
    public function __construct($menuTitle, $viewRole, $alterRole, $listRoute, $createRoute)
    {
        $this->menuTitle = $menuTitle;
        $this->viewRole = $viewRole;
        $this->alterRole = $alterRole;
        $this->listRoute = $listRoute;
        $this->createRoute = $createRoute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.expandable-nav-item');
    }
}
