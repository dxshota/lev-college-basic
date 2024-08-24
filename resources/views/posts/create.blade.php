<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> <!-- 現在のアプリケーションの言語設定を動的に設定 -->
<head> 
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200..900&display=swap" rel="stylesheet"> <!--google fontsの埋め込み-->
    <meta charset="UTF-8">
    <title>投稿画面</title>
    </head>
    <body>
        <h1>投稿</h1>
        <form action ="/posts" method ="POST">
            @csrf <!-- 必ず記述 -->
            <div class = 'title'>
            <h2>Title</h2>    
            <input type="text" name="post[title]" placeholder="タイトル" value="{{ old('post.title') }}"/>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p> <!--firstの引数にバリデーションのキーを入力することで該当キーのバリデーションエラーを取得できます。-->
            </div>

            <div class = 'body'>
                <h2>Content</h2>    
                <textarea name="post[body]" placeholder="本文">{{ old('post.body') }}</textarea> <!-- old('キー名')バリデーションエラーで再度画面を表示した場合、直前のリクエストから入力項目にデータを入れた状態にする-->
                <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="保存" />
        </form>    
        
        <div class='footer'>
            <a href = "/">戻る</a>
        </div>        
    </body>
</html>