<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReviewCard extends Component
{
    public $text;
    public $sender;
    public $rating;
    public $image;
    /**
     * Create a new component instance.
     */
    public function __construct($sender, $rating, $text, $image)
    {
        $this->sender = $sender;
        $this->rating = $rating;
        $this->text = $text;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.review-card');
    }
}
