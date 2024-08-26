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
Route::get('/posts/create', [PostController::class, 'create']); //必ずRoute::get('/posts/{post}', [PostController::class,'show']);の上に書く
Route::post('/posts', [PostController::class, 'store']); //保存ボタン押下された時のルーティング
Route::get('/posts/{post}', [PostController::class, 'show']);
Route::get('/posts/{post}/edit', [PostController::class, 'edit']); //編集画面
Route::put('/posts/{post}', [PostController::class, 'update']); //編集実行
// '/posts/{対象データのID}'にGetリクエストが来たら、PostControllerのshowメソッドを実行する
//ルートパラメータは関数の引数の変数と一致した名前にする