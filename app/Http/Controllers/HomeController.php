<?php

namespace App\Http\Controllers;
use App\Recharge;

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
        $recharges = Recharge::orderBy('created_at', 'asc')->get();
		return view('dashboard', [
            'recharges' => $recharges
        ]);
    }
}
