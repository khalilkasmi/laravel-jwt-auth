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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

//Route::middleware('cors')->group(function () {
  Route::get('/auth/google','AuthController@redirectToProvider')->middleware('cors');
  Route::get('callback/google','AuthController@handleProviderCallback')->middleware('cors');
//});

Route::get('triggerLogin',function (){
  $uri = ' https://accounts.google.com/o/oauth2/auth?client_id=553768821696-j4nl52epir2atmhcah2arsu10n1ngace.apps.googleusercontent.com&redirect_uri=http%3A%2F%2Flocalhost%3A8000%2Fapi%2Fcallback%2Fgoogle&scope=openid+profile+email&response_type=code';
  return $uri;
});




