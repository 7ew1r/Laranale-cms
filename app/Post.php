<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function Comments()
    {
        // 投稿はコメントを多く持つ
        return $this->hasMany('App\Comment', 'post_id');
    }

    public function Category()
    {
        // 投稿は一つのカテゴリーに属する
        return $this->belongsTo('App\Category', 'cat_id');
    }

    public function User()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
