<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title','body','cover','published'
    ];
    protected $dates = ['deleted_at'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_post');
    }

    public function author() 
    {
        return $this->belongsTo(User::class,'author_id');
    }

    public function scopePublished($query)
    {
        return $query->where('published', true);
    }
}
