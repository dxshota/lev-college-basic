<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!-- 現在のアプリケーションの言語設定を動的に設定 -->
<head> 
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet"> <!--google fontsの埋め込み-->
    <meta charset="UTF-8">
    <title>編集画面</title>
    </head>
    <body>
        <h1>編集画面</h1>
        <form action ="/posts/{{ $post->id }}" method ="POST">
            @csrf <!-- 必ず記述 -->
            @method('PUT')  <!--クエストを送信する際にPUTリクエストとして送信するようになる -->
            <div class = 'title'>
            <h2>タイトル</h2>    
            <input type="text" name="post[title]" value="{{ $post->title}}"/> <!-- もともとの文章を初期入力としてvalueで読み込み-->
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p> <!--firstの引数にバリデーションのキーを入力することで該当キーのバリデーションエラーを取得できます。-->
            </div>

            <div class = 'body'>
                <h2>本文</h2>    
                <textarea name="post[body]">{{ $post->body }}</textarea> <!-- もともとの本文を読み込み-->
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="保存" />
        </form>    
        
        <div class='footer'>
            <a href = "/">戻る</a>
        </div>        
    </body>
</html>