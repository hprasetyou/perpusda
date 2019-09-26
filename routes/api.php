<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware'=>'auth:api','namespace' => 'Admin'],function () {
    $resources = ['user','book','category','author','publisher','member','borrowed_book','returned_book','penalty_return'];
    $routeResouce = [];
    foreach ($resources as $key => $item) {
        $routeResouce[$item] = str_replace('_', '', ucwords($item, '_')) . 'Controller';
    }
    Route::resources($routeResouce);
});