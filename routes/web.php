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
use App\Operator;
use App\Ticket;
use App\Account;
use App\Ledger;
use App\Message;
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

    Route::get('operators', function () {
        $user = Auth::user();
        $operators = Operator::where('user_id', $user->user_id)->orderBy('created_at', 'asc')->get();
		return view('corporate_user.operators', [
            'operators' => $operators
        ]);
    })->name('operators');

    Route::get('recharge-report', function () {
        $user = Auth::user();
        $recharges = Recharge::where('user', $user->name)->orderBy('created_at', 'asc')->get();
		return view('pages.recharge_report', [
            'recharges' => $recharges
        ]);
    })->name('recharge_report');

    Route::get('refill-report', function () {
        $user = Auth::user();
        $recharges = Recharge::where('user', $user->name)->orderBy('created_at', 'asc')->get();
		return view('pages.refill_report', [
            'recharges' => $recharges
        ]);
	})->name('refill_report');

    Route::get('topup_recharge', function () {
		return view('recharge.topup_recharge');
    })->name('topup_recharge');

    Route::get('skitto_recharge', function () {
		return view('recharge.skitto_recharge');
    })->name('skitto_recharge');

    Route::get('bulk_recharge', function () {
		return view('recharge.bulk_recharge');
	})->name('bulk_recharge');

    Route::post('topup_recharge', function (Request $request) {
        $user = Auth::user();
        $account = Account::where('user_id', $user->id)->first();
        if($account->balance > 0 && $request->amount <= $account->balance) {
            $recharge = new Recharge;
            $recharge->user = Auth::user()->name;
            $recharge->mobile_no = $request->mobile_no;
            $recharge->amount = $request->amount;
            $recharge->type = $request->type;
            $recharge->operator = $request->operator;
            $recharge->status = 'Success';
            $recharge->save();

            $account->balance = $account->balance - $recharge->amount;
            $account->save();

            $ledger = new Ledger;
            $ledger->user_id = $user->id;
            $ledger->debit = $recharge->amount;
            $ledger->credit = 0;
            $ledger->balance = $account->balance;
            $ledger->description = $recharge->mobile_no.' Recharged with Tk.'.$recharge->amount.'. Ref: 0b5d6850-b02f-11e9-b82f-5d906471783f';
            $ledger->save();

            return redirect('topup_recharge')->withStatus(__('completed'));
        }

        return redirect('topup_recharge')->withStatus(__('failed'));
    })->name('recharge.edit');

    Route::get('ticket', function () {
		return view('corporate_user.ticket');
	})->name('ticket.create');

    Route::post('ticket', function (Request $request) {
        $ticket = new Ticket;
        $ticket->user_name = Auth::user()->name;
        $ticket->user_id = Auth::user()->id;
        $ticket->ticket_type = $request->ticket_type;
        $ticket->ticket_for = $request->ticket_for;
        $ticket->description = $request->description;
        $ticket->status = 'Ongoing';
        $ticket->save();

        return redirect('ticket')->withStatus(__('Ticket Successfully Submitted'));
    })->name('ticket.edit');

    Route::get('ongoing_tickets', function () {
        $user = Auth::user();
        $tickets = Ticket::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
		return view('corporate_user.ongoing_tickets', [
            'tickets' => $tickets
        ]);
	})->name('ongoing_tickets');

	Route::get('stock_balance', function () {
        $recharges = Recharge::orderBy('created_at', 'desc')->get();
		return view('admin.stock_balance', [
            'recharges' => $recharges
        ]);
	})->name('stock_balance');

	Route::get('sales', function () {
        $recharges = Recharge::orderBy('created_at', 'desc')->get();
		return view('admin.sales', [
            'recharges' => $recharges
        ]);
	})->name('sales');

    Route::get('admin_recharge_report', function () {
        $recharges = Recharge::orderBy('created_at', 'desc')->get();
		return view('admin.recharge_report', [
            'recharges' => $recharges
        ]);
    })->name('admin_recharge_report');

    Route::get('admin_ticket', function () {
        $tickets = Ticket::orderBy('created_at', 'desc')->get();
		return view('admin.tickets', [
            'tickets' => $tickets
        ]);
    })->name('admin_ticket');

    Route::get('admin_requests', function () {
        $tickets = Ticket::where('ticket_type', 'Request')->orderBy('created_at', 'desc')->get();
		return view('admin.requests', [
            'tickets' => $tickets
        ]);
	})->name('admin_requests');

	Route::get('recharge_request', function () {
		return view('admin.recharge_request');
	})->name('recharge_request');

	Route::get('admin_invoice', function () {
		return view('admin.invoice');
    })->name('admin_invoice');

    Route::get('admin_inbox', function () {
        $messages = Message::orderBy('created_at', 'desc')->get();
		return view('admin.inbox', [
            'messages' => $messages
        ]);
	})->name('admin_inbox');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

