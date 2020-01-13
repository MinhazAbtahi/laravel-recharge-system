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

	Route::get('typography', function () {
		return view('pages.typography');
	})->name('typography');

	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');

	Route::get('map', function () {
		return view('pages.map');
	})->name('map');

	Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');

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

