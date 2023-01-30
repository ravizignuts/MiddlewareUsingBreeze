<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Route::get('admin',function(){
//     // if(auth()->user()->is_admin){ //You can do this but this is not right way beacuse you have to write this condition in all route
//     // dd('AdminPage');
//     // }else{
//     //     abort(401);
//     // }
//      dd('AdminPage');

// })->middleware('auth','admin');

// Route::group(['middleware'=>['auth','admin']],function(){
//     Route::get('admin',function(){
//         return view('auth.admin');
//     });
// });==>This is done by Controller also
Route::get('admin',[AuthController::class,'index']);
require __DIR__.'/auth.php';
