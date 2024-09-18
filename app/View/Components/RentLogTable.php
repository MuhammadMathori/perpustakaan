<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RentLogTable extends Component
{
    public $rentLog;
    /**
     * Create a new component instance.
     */
    public function __construct($rentLog)
    {
        $this->rentLog = $rentLog;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.rent-log-table');
    }
}
