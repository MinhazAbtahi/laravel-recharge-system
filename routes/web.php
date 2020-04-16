<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Recharge;
use App\Ticket;
use Illuminate\Http\Request;


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
	Route::get('table-list', function () {
		return view('pages.table_list');
    })->name('table');

    Route::get('recharge-report', function () {
        $recharges = Recharge::orderBy('created_at', 'asc')->get();
		return view('pages.recharge_report', [
            'recharges' => $recharges
        ]);
    })->name('recharge_report');

    Route::get('refill-report', function () {
        $recharges = Recharge::orderBy('created_at', 'asc')->get();
		return view('pages.refill_report', [
            'recharges' => $recharges
        ]);
	})->name('refill_report');

    Route::get('recharge', function () {
		return view('recharge.recharge');
	})->name('recharge');

    Route::post('recharge', function (Request $request) {
        $recharge = new Recharge;
        $recharge->user = Auth::user()->name;
        $recharge->mobile_no = $request->mobile_no;
        $recharge->amount = $request->amount;
        $recharge->type = $request->type;
        $recharge->operator = $request->operator;
        $recharge->status = 'Succeed';
        $recharge->save();

        return redirect('recharge')->withStatus(__('Recharge Successfully Completed'));
    })->name('recharge.edit');

    Route::get('ticket', function () {
		return view('corporate_user.ticket');
	})->name('ticket');

    Route::post('ticket', function (Request $request) {
        $ticket = new Ticket;
        $ticket->user_name = Auth::user()->name;
        $ticket->user_id = Auth::user()->id;
        $ticket->ticket_type = $request->ticket_type;
        $ticket->ticket_for = $request->ticket_for;
        $ticket->description = $request->description;
        $ticket->status = 'Succeed';
        $ticket->save();

        return redirect('ticket')->withStatus(__('Ticket Successfully Submitted'));
    })->name('ticket.edit');

	Route::get('stock_balance', function () {
        $recharges = Recharge::orderBy('created_at', 'asc')->get();
		return view('admin.stock_balance', [
            'recharges' => $recharges
        ]);
	})->name('stock_balance');

	Route::get('sales', function () {
        $recharges = Recharge::orderBy('created_at', 'asc')->get();
		return view('admin.sales', [
            'recharges' => $recharges
        ]);
	})->name('sales');

    Route::get('admin_recharge_report', function () {
        $recharges = Recharge::orderBy('created_at', 'asc')->get();
		return view('admin.recharge_report', [
            'recharges' => $recharges
        ]);
    })->name('admin_recharge_report');

    Route::get('admin_ticket', function () {
        $tickets = Ticket::orderBy('created_at', 'asc')->get();
		return view('admin.tickets', [
            'tickets' => $tickets
        ]);
    })->name('admin_ticket');

	Route::get('recharge_request', function () {
		return view('admin.recharge_request');
	})->name('recharge_request');

	Route::get('admin_invoice', function () {
		return view('admin.invoice');
	})->name('admin_invoice');

	Route::get('rtl-support', function () {
		return view('pages.language');
	})->name('language');

	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

