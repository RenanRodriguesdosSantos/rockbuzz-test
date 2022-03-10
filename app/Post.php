<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $guarded = [];
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function has_tag($tag_id)
    {
        $rows = \DB::table('tag_post')->where('tag_id', '=', $tag_id)->where('post_id', '=', $this->id)->get();

        if (count($rows) > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function tags(){
        return $this->belongsToMany(Tag::class, 'tag_post');
    }
    public function autor() {
        return $this->belongsTo(User::class,'id_autor');
    }
}
