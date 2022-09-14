<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mainController;

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

// Route::get('/', function () {
//     return view('main');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/', [mainController::class, 'index'])->name('main')->middleware(['auth']);
Route::get('/table', [mainController::class, 'table'])->name('table');
Route::post('/Chtable', [mainController::class, 'Chtable'])->name('Chtable');
Route::get('/brickBreaker', [mainController::class, 'brickBreaker'])->name('brickBreaker');
Route::post("/savetable", [mainController::class, 'savetable'])->name('savetable');
Route::post("/insTodoList", [mainController::class, 'insTodoList'])->name('insTodoList');
Route::post("/delTodoList", [mainController::class, 'delTodoList'])->name('delTodoList');


