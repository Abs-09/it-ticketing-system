<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropDownLink extends Component
{
    public $activeRoutes;

    public function __construct($activeRoutes = [])
    {
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
     */
    public function render(): View|Closure|string
    {
        return view('components.drop-down-link');
    }
}
