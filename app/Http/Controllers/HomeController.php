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
        $chart1->dataset('Account Summary', 'bar', [1000, 2000, 3000, 4000]);

        $chart2 = new TransactionHistoryChart;
        $chart2->labels(['01/01/2020', '10/01/2020', '15/01/2020', '20/01/2020']);
        $chart2->dataset('Transaction History', 'line', [1000, 2000, 3000, 4000]);

        $recharges = Recharge::orderBy('created_at', 'asc')->get();
		return view('dashboard', [
            'recharges' => $recharges,
            'chart1' => $chart1,
            'chart2' => $chart2
        ]);
    }
}
