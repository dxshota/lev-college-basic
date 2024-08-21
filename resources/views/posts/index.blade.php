<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!-- 現在のアプリケーションの言語設定を動的に設定 -->
<head> 
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet"> <!--google fontsの埋め込み-->
        <meta charset="UTF-8">
        <title>ブログ投稿一覧</title>
    </head>
    <body class = "body">
        <h1>ブログ投稿一覧</h1>
        @foreach ($posts as $post)
            <div class = 'posts'>
                <h2 class = 'title'>{{ $post->title }}</h2>                
                <p class = 'body'>{{ $post->body }}</p> 
            </div>    
        @endforeach
        <div class='paginate'>
            {{ $posts->links() }}
        </div>        
    </body>
</html>