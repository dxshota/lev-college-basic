<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; //appにするとエラー,Appか確認
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index']);
Route::get('/posts/{post}', [PostController::class, 'show']);
// '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
//ルートパラメータは関数の引数の変数と一致した名前にする