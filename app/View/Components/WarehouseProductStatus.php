<?php

namespace App\View\Components;

use App\Models\Warehouse;
use Illuminate\View\Component;

class WarehouseProductStatus extends Component
{
    public $status;
    public $badge_type;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($status)
    {
        $this->status = $status;
        if($this->status == Warehouse::STATUS_ATTIVO){
            $this->badge_type = "badge-primary";
        }else if($this->status == Warehouse::STATUS_NON_ATTIVO){
            $this->badge_type = "badge-warning";
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.warehouse-product-status');
    }
}
