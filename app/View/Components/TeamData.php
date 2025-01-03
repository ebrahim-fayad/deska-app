<?php

namespace App\View\Components;

use App\Models\Member;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TeamData extends Component
{
    public $members;
    public function __construct()
    {
        $this->members =Member::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.team-data');
    }
}
