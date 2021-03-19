<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Subheader extends Component
{
    public $title;
    public $subtitle;
    /**
     * Create a new component instance.
     *
     * @param $title
     * @param $subtitle
     */
    public function __construct(string $title, ?string $subtitle = null)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
    }


    public function render()
    {
        return view('components.subheader');
    }
}
