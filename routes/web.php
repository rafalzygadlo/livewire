<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

// user routes

Route::get('/login',App\Livewire\Auth\Login::class)->name('login');
Route::post('/login',[App\Livewire\Auth\Login::class,'login'])->name('login');
Route::get('/logout',[App\Livewire\Auth\Login::class,'logout'])->name('logout');

Route::get('register', App\Livewire\Auth\Register::class)->name('register');


Route::group([
    'middleware' => ['auth']
    /* 'as' => 'usr.'*/
], function ()
{

    Route::get('/',App\Livewire\Home::class);
    Route::get('/home',App\Livewire\Home::class)->name('home.index');
    Route::get('/user',App\Livewire\User\User::class)->name('user.index');
    Route::get('/employee',App\Livewire\Employee\Employee::class)->name('employee.index');
    Route::get('/word',App\Livewire\Word\Word::class)->name('word.index');
    Route::get('/rate',App\Livewire\Rate\Rate::class)->name('rate.index');

    Route::get('/settings',App\Livewire\Settings::class)->name('settings.index');
    Route::get('/profile',App\Livewire\User\Profile::class)->name('profile.index');

    // Trasy weryfikacji E-mail
    Route::get('/email/verify', function () {
        return view('auth.verify-email'); // Możesz stworzyć ten widok lub przekierować gdzieś indziej
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/home');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'Link weryfikacyjny został wysłany!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

});




//
