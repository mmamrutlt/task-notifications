<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Lightit\Backoffice\Users\App\Controllers\{
    DeleteUserController, GetUserController, ListUserController, StoreUserController
};
use Lightit\Backoffice\Employees\App\Controllers\{
    DeleteEmployeeController, GetEmployeeController, ListEmployeeController, StoreEmployeeController
};
use Lightit\Backoffice\Tasks\App\Controllers\{
    DeleteTaskController, GetTaskController, ListTaskController, StoreTaskController, AssignTaskController, UpdateTaskController
};

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
    ->middleware([])
    ->group(static function () {
        Route::get('/', ListEmployeeController::class);
        Route::get('/{employee}', GetEmployeeController::class)->withTrashed();
        Route::post('/', StoreEmployeeController::class);
        Route::delete('/{employee}', DeleteEmployeeController::class);
    });

/*
|--------------------------------------------------------------------------
| Tasks Routes
|--------------------------------------------------------------------------
*/
Route::prefix('tasks')
    ->middleware([])
    ->group(static function () {
        Route::get('/', ListTaskController::class);
        Route::get('/{task}', GetTaskController::class)->withTrashed();
        Route::post('/', StoreTaskController::class);
        Route::put('/{task}', UpdateTaskController::class);
        Route::delete('/{task}', DeleteTaskController::class);
        Route::post('/{task}/assign', AssignTaskController::class);
    });