<?php

namespace App\View\Components;

use App\Models\Coupon;
use Illuminate\View\Component;

class couponBoxes extends Component
{
    public $box;
    public $badge_type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($box)
    {
        $this->box = $box;
        if(in_array($this->box, [
            Coupon::BOX_4, Coupon::BOX_8, Coupon::BOX_12, Coupon::BOX_16, Coupon::BOX_32, Coupon::BOX_64
        ])){
            $this->badge_type = "badge-primary";
        }else{
            $this->badge_type = "badge-info";
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.coupon-boxes');
    }
}
