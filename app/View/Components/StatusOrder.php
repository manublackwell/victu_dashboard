<?php

namespace App\View\Components;

use App\Models\Order;
use Illuminate\View\Component;

class StatusOrder extends Component
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
        if(in_array($this->status, [Order::STATUS_IN_SPEDIZIONE, Order::STATUS_IN_ATTESA, Order::STATUS_RIMBORSATO])){
            $this->badge_type = "badge-info";
        }else if(in_array($this->status, [Order::STATUS_PAGAMENTO_ACCETTATO, Order::STATUS_IN_ELABORAZIONE, Order::STATUS_CONSEGNATO])){
            $this->badge_type = "badge-success";
        }else if($this->status == Order::STATUS_CANCELLATO){
            $this->badge_type = "badge-secondary";
        }else if($this->status == Order::STATUS_ERRORE){
            $this->badge_type = "badge-danger";
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.status-order');
    }
}
