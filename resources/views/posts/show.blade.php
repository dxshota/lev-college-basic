<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!-- 現在のアプリケーションの言語設定を動的に設定 -->
<head> 
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet"> <!--google fontsの埋め込み-->
    <meta charset="UTF-8">
    <title>投稿</title>
    </head>
    <body>
        <h1 class = 'title'>{{ $post->title}}</h1>
        
            <div class = 'content'>
                <h3>本文</h3>                
                <p>{{ $post->body }}</p> 
            </div>    
        <div class="edit">
            <a href="/posts/{{ $post->id }}/edit">編集</a> <!-- 編集画面を表示 -->
        </div>
        <div class='footer'>
            <a href = "/">戻る</a>
        </div>        
    </body>
</html>