<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NavLink extends Component
{
    /**
     * Create a new component instance.
     */
    public $href;
    public $activeRoutes;

    public function __construct($href, $activeRoutes = [])
    {
        $this->href = $href;
        $this->activeRoutes = is_array($activeRoutes) ? $activeRoutes : [$activeRoutes];
    }

    public function isActive()
    {
        foreach ($this->activeRoutes as $route) {
            if (request()->routeIs($route)) {
                return true;
            }
        }
        return false;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render(): View|Closure|string
    {
        return view('components.nav-link');
    }
}
