<?php

namespace App\View\Components;

use App\Models\Room;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RoomCard extends Component
{
    public $type;
    public $description;
    public $remaining;
    public $price;
    public $message;
    public $image;
    /**
     * Create a new component instance.
     */

    public function __construct($type, $description, $price, $image)
    {
        $this->type = $type;
        $this->description = $description;
        $this->price = $price;
        $this->image = $image;
        $this->message = 'Halo, saya ingin memesan kamar Tipe ' . $type . '. Apakah masih tersedia?';

        $this->remaining = Room::where('type', $type)
            ->whereNull('customer_id')
            ->count();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.room-card');
    }
}
