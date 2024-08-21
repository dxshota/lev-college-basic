<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function index(Post $post)
{
    return view('posts.index')->with(['posts' => $post->getByLimit()]);
}
        public function getPaginateByLimit(int $limit_count = 3)
    {
        // id で降順に並べたあと、limitで件数制限をかける
        return $this->orderBy('id', 'DESC')->paginate($limit_count);
    }
}

