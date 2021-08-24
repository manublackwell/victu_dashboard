<?php

namespace App\View\Components;

use \App\Models\Coupon;
use Illuminate\View\Component;

class CouponValue extends Component
{
    public $result;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($value, $type, $orderCost)
    {
        $this->value = $value;
        $this->type = $type;
        $this->orderCost = $orderCost;
        
        if($this->type == Coupon::TYPE_PERCENTAGE){
            $this->result = ($this->value * $this->orderCost) / 100;
        }else if($this->type == Coupon::TYPE_NUMERIC){
            $this->result = $value;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.coupon-value');
    }
}
