<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MetaData extends Model
{
    use HasFactory;

    protected $fillable = ['meta_title', 'meta_description', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
