<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest; //Postrequestのuse宣言
class PostController extends Controller
{
        public function index(Post $post){ //postモデルをもとに$postインスタンスを作成
            return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]); //bladeファイルに渡す 
            //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
            //getPaginateByLimit()はPost.phpで定義したメソッドです。
        }
        public function show(Post $post) 
        {
            //dd($post) //デバッグ用 attributesを見る
            return view('posts.show')->with(['post' => $post]);
        //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
        }
        public function create()
        {
            return view('posts.create');
        }

        public function store(Post $post, Postrequest $request){ //ユーザからのリクエストに含まれるデータを扱う場合、Requestインスタンスを利用
            $input = $request['post'];
            $post->fill($input)->save();
            return redirect('/posts/' . $post->id); //delete put postのときredirect使う 
        }
}
