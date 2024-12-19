<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ActionButton extends Component
{
    public $color, $text;
    public function __construct(public string $name ,public string $href,public string $type)
    {
        switch ($type) {
            case 'create':
                $this->color = 'primary';
                $this->text = $name;
                break;
            case 'edit':
                $this->color = 'success';
                $this->text = "<i class='fe fe-edit fa-2x'></i>";
                break;
            case 'show':
                $this->color = 'warning';
                $this->text = "<i class='fe fe-eye fa-2x'></i>";
                break;
            case 'restore':
                $this->color = 'primary';
                $this->text = "<i class='fe fe-refresh-ccw fa-2x'></i>";
                break;
        }

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.action-button');
    }
}
