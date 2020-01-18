<?php

namespace App\Http\Controllers;
use App\Recharge;
use App\Charts\AccountSummaryChart;
use App\Charts\TransactionHistoryChart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $chart1 = new AccountSummaryChart;
        $chart1->labels(['January', 'February', 'March', 'April']);
        $chart1->dataset('Debit', 'bar', [rand(500, 2000), 2000, rand(500, 2000), rand(500, 2000)])->color('#FFC107')->backgroundColor('#FFC107');
        $chart1->dataset('Credit', 'bar', [1000, 2000, rand(500, 2000), rand(500, 2000)])->color('#03A9F4')->backgroundColor('#03A9F4');
        $chart1->dataset('Balance', 'bar', [1000, rand(500, 2000), 3000, rand(500, 2000)])->color('#8BC34A')->backgroundColor('#8BC34A');

        $chart2 = new TransactionHistoryChart;
        $chart2->labels(['01/01/2020', '10/01/2020', '15/01/2020', '20/01/2020']);
        $chart2->dataset('Debit', 'line', [rand(500, 2000), 2000, rand(500, 2000), rand(500, 2000)])->color('#FFC107')->options([
            'fill' => false,
        ]);;
        $chart2->dataset('Credit', 'line', [1000, 2000, rand(500, 2000), rand(500, 2000)])->color('#03A9F4')->options([
            'fill' => false,
        ]);
        $chart2->dataset('Balance', 'line', [1000, rand(500, 2000), 3000, rand(500, 2000)])->color('#8BC34A')->options([
            'fill' => false,
        ]);

        $recharges = Recharge::orderBy('created_at', 'asc')->get();
		return view('dashboard', [
            'recharges' => $recharges,
            'chart1' => $chart1,
            'chart2' => $chart2
        ]);
    }
}
