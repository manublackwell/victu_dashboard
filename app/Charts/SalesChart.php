<?php

declare(strict_types = 1);

namespace App\Charts;

use App\Models\Order;
use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesChart extends BaseChart
{
    public $dataset = [];
    public $months = [];
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $orders =   Order::select(
                    DB::raw('sum(costo) as sums'),
                    DB::raw("DATE_FORMAT(dataregistrazione,'%M %Y') as months")
                    )
                    ->groupBy('months')
                    ->get();

        foreach($orders as $order){
            array_push($this->months,$order->months);
            array_push($this->dataset, number_format((float)$order->sums, 2, '.', ''));
        }

        return Chartisan::build()
            ->labels($this->months)
            ->dataset('Ordini', $this->dataset);
    }
}
