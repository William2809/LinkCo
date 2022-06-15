<?php

use App\Http\Controllers\commentController;
use App\Http\Controllers\exploreController;
use App\Http\Controllers\followingController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\landingController;
use App\Http\Controllers\likeController;
use App\Http\Controllers\postingController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\userTypeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', landingController::class);

// Route::get('/usertype', function () {
//     return view('/auth/user-type');
// });

Route::middleware('auth')->group(function () {
    // Route::view('home', 'home')->name('home');
    Route::get('home', homeController::class)->name('home');

    Route::get('explore', exploreController::class)->name('explore');

    Route::get('search', [searchController::class, 'searchPage'])->name('search');

    Route::get('usertype/new', [userTypeController::class, 'new'])->name('usertype.new');

    Route::post('usertype/update', [userTypeController::class, 'store'])->name('usertype.update');

    Route::post('posting', [postingController::class, 'store'])->name('posting.store');




    Route::post('profile/{user}', [followingController::class, 'store'])->name('following.store');

    Route::get('profile/{user}', [profileController::class, 'index'])->name('profile');

    Route::get('profile/{user}/detail', [profileController::class, 'viewDetail'])->name('detail');

    Route::put('profile/{user}/detail/update', [profileController::class, 'update'])->name('profile.update');

    Route::put('profile/{user}/detail/updateBackground', [profileController::class, 'updateBackground'])->name('profile.updateBg');

    Route::put('profile/{user}/detail/updatePassword', [profileController::class, 'updatePassword'])->name('profile.updatePw');
    //likes
    Route::post('like/{posting}', [likeController::class, 'store'])->name('like.store');

    //comments
    Route::post('comment/{posting}', [commentController::class, 'store'])->name('comment.store');
});



// Route::get('/login', function () {
//     return view('/auth/login');
// });

// Route::get('/register', function () {
//     return view('/auth/register');
// });


// Route::get('/', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
