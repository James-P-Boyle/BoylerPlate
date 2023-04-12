<?php

namespace App\Models;

use App\Models\MetaData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'excerpt', 'body', 'image_path', 'is_published', 'min_to_read', 'user_id'
    ];

    public static function boot(): void
    {
        parent::boot();

        static::updated(function (Post $post) {
            logger('Post ' . $post->id . ' was updated.');
            //mail me about that
        });
    }


    public function user()
    {
       return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function metaData(): HasOne
    {
        return $this->hasOne(MetaData::class);
    }


    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }


    public function scopeForPublicIndex($query)
    {
        return $query->with('tags')
            ->published()
            ->orderBy('updated_at', 'desc');
    }
}
