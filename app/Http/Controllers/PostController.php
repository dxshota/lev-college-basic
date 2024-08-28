<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\PostRequest; //Postrequestのuse宣言
class PostController extends Controller
{
        public function index(Post $post){ //postモデルをもとに$postインスタンスを作成
            return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]); //bladeファイルに渡す 
            //blade内で使う変数'posts'と設定。'posts'の中身にget()を使い、インスタンス化した$postを代入。
            //getPaginateByLimit()はPost.phpで定義したメソッドです。
        }
        public function show(Post $post) 
        {
            //dd($post) //デバッグ用 attributesを見る
            return view('posts.show')->with(['post' => $post]);
        //設定された'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
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

        public function edit(Post $post)
        {
            return view('posts.edit')->with(['post' => $post]);
        }

        public function update(PostRequest $request, Post $post)
        {
            $input_post = $request['post'];
            $post->fill($input_post)->save(); //$postのパラメータをinputで受け取ったユーザの入力データで上書きし、保存
                                            //ill/saveを利用することで、全データを無条件で更新するのではなく、差分がある場合のみDBを更新する
            return redirect('/posts/' . $post->id);
        }

        public function delete(Post $post)
        {
            $post->delete();
            return redirect('/');
        }
}
