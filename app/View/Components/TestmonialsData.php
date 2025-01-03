<?php

namespace App\View\Components;

use App\Models\Testmonial;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TestmonialsData extends Component
{
    public $testmonials;
    public function __construct()
    {
        $this->testmonials = Testmonial::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.testmonials-data');
    }
}
