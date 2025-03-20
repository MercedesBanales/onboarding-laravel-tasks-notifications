<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Lightit\Backoffice\Employees\App\Controllers\ListEmployeeController;
use Lightit\Backoffice\Employees\App\Controllers\StoreEmployeeController;
use Lightit\Backoffice\Tasks\App\Controllers\ListTasksController;
use Lightit\Backoffice\Tasks\App\Controllers\GetTaskController;
use Lightit\Backoffice\Tasks\App\Controllers\StoreTaskController;
use Lightit\Backoffice\Tasks\App\Controllers\UpdateTaskController;
use Lightit\Backoffice\Users\App\Controllers\DeleteUserController;
use Lightit\Backoffice\Users\App\Controllers\GetUserController; 
use Lightit\Backoffice\Users\App\Controllers\ListUserController;
use Lightit\Backoffice\Users\App\Controllers\StoreUserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/
Route::prefix('users')
    ->middleware([])
    ->group(static function () {
        Route::get('/', ListUserController::class);
        Route::get('/{user}', GetUserController::class)->withTrashed();
        Route::post('/', StoreUserController::class);
        Route::delete('/{user}', DeleteUserController::class);
    });

/*
|--------------------------------------------------------------------------
| Employees Routes
|--------------------------------------------------------------------------
*/
Route::prefix('employees')
    ->name('employees.')
    ->group(static function () {
        Route::get('/', ListEmployeeController::class)->name('list');
        Route::post('/', StoreEmployeeController::class)->name('store');
});

/*
|--------------------------------------------------------------------------
| Tasks Routes
|--------------------------------------------------------------------------
*/
Route::prefix('tasks')
    ->name('tasks.')
    ->group(static function () {
        Route::get('/', ListTasksController::class)->name('list');
        Route::get('/{task}', GetTaskController::class)->name('show');
        Route::post('/', StoreTaskController::class)->name('store');
        Route::put('/{task}', UpdateTaskController::class)->name('update');
});
