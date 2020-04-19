<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Ledger;
use App\Ticket;
use App\Recharge;
use App\Account;
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
        $user = Auth::user();

        // USER & CORPORATE USER DASHBOARD
        if ($user->getUserRole() == 'corporate user' || $user->getUserRole() == 'user') {
            // DATA CONTAINERS
            $account = Account::where('user_id', $user->id)->first();
            $ledger = Ledger::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
            $tickets = Ticket::where('user_id', $user->id)->get();
            $recharges = Recharge::orderBy('created_at', 'desc')->get();

            $current_month = date('m');
            $account_summary_data = Ledger::select('debit', 'credit', 'balance', 'created_at')->where('user_id', $user->id)->whereRaw('MONTH(created_at) = ?',[$current_month])->get();
            $labels = array();
            $debits = array();
            $credits = array();
            $balance = array();

            foreach($account_summary_data as $data) {
                array_push($labels, $data->created_at->toFormattedDateString());
                array_push($debits, $data->debit);
                array_push($credits, $data->credit);
                array_push($balance, $data->balance);
            }

            // CHARTS
            $chart1 = new AccountSummaryChart;
            $chart1->labels($labels);
            $chart1->dataset('Debit', 'bar', $debits)->color('#FFC107')->backgroundColor('#FFC107');
            $chart1->dataset('Credit', 'bar', $credits)->color('#03A9F4')->backgroundColor('#03A9F4');
            $chart1->dataset('Balance', 'bar', $balance)->color('#8BC34A')->backgroundColor('#8BC34A');

            $chart2 = new TransactionHistoryChart;
            $chart2->labels($labels);
            $chart2->dataset('Debit', 'line', $debits)->color('#FFC107')->options([
                'fill' => false,
            ]);;
            $chart2->dataset('Credit', 'line', $credits)->color('#03A9F4')->options([
                'fill' => false,
            ]);
            $chart2->dataset('Balance', 'line', $balance)->color('#8BC34A')->options([
                'fill' => false,
            ]);

            return view('corporate_user.dashboard', [
                'account' => $account,
                'ledger' => $ledger,
                'tickets' => $tickets,
                'recharges' => $recharges,
                'chart1' => $chart1,
                'chart2' => $chart2
            ]);
        }
        // ADMIN DASHBOARD
        else if($user->getUserRole() == 'admin') {
            $recharges = Recharge::orderBy('created_at', 'asc')->get();
            $account = Account::where('user_id', $user->id)->get();
            $tickets = Ticket::where('user_id', $user->id)->get();
            return view('admin.dashboard', [
                'recharges' => $recharges,
                'account' => $account,
                'tickets' => $tickets
            ]);
        }

        return view('admin.dashboard');
    }
}
