<?php

use App\Http\Livewire\AirlineCreator;
use App\Http\Livewire\BondCheckReport;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\OverstayReport;
use App\Models\User;
use App\Http\Livewire\RecordAwb;
use App\Models\Airline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', function () {


    return view('welcome');
});

Route::middleware(['auth'])->group(
    function () {
        Route::get('/bondcheck', RecordAwb::class)->name('bondcheck.record');
        Route::get('report', BondCheckReport::class)->name('bondcheck.report');
        Route::get('overstay', OverstayReport::class)->name('overstay');
        Route::get('airline', AirlineCreator::class)->name('airline');
        Route::get('dashboard', Dashboard::class)->name('dashboard');
    }
);

Route::get('/logout', function () {
    Auth::logout();
    return view('layouts.login');
})->name('logout');
Route::get('/login', function () {

    return view('layouts.login');
})->name('login');

Route::post('/login', function (Request $request) {

    $credentials = [
        'samaccountname' => $request->username,
        'password' => $request->password,
    ];
    //dd($credentials);
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        return redirect()->route('bondcheck.record');
    } else {
        dd('Failed');
    }
})->name('login.post');
