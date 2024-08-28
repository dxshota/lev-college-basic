<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!-- 現在のアプリケーションの言語設定を動的に設定 -->
<head> 
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet"> <!--google fontsの埋め込み-->
        <meta charset="UTF-8">
        <title>ブログ投稿一覧</title>
    </head>
    <body class = "body">
        <h1>ブログ投稿一覧</h1>
        <a href='/posts/create'>投稿</a>
        @foreach ($posts as $post)
            <div class = 'posts'> <!-- class属性posts -->
                <h2 class = 'title'>
                <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                </h2>                
                <p class = 'body'>{{ $post->body }}</p> 
                <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post">
                @csrf
                @method('DELETE')
                    <button type="button" onclick="deletePost({{ $post->id }})">delete</button> 
                </form>
            </div>  
            
        @endforeach
        <div class='paginate'>
            {{ $posts->links() }}
        </div>
        
        <script>
            function deletePost(id) {
                'use strict'

                if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                    document.getElementById(`form_${id}`).submit();
                }
            }
        </script>
    </body>
</html>