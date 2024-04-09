<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'image',
        'content',
        'publish_at',
        'featured'
    ];
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
    protected $casts = ['publish_at' => 'datetime'];
    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->content), 150);
    }
    public function getReadingTime()
    {
        $mins = round(str_word_count($this->content) / 250);
        return ($mins < 1) ? 1 : $mins;
    }
    public function scopePublished($query)
    {
        $query->where('publish_at', '<=', Carbon::now());
    }
    public function scopeWithCategory($query, string $category)
    {
        $query->whereHas('categories', function($query) use($category){
            $query->where('slug', $category);
        });
    }
    public function scopeFeatured($query)
    {
        $query->where('featured', '<=', Carbon::now());
    }
    public function getThumbnailImage()
    {
        $is_Url = str_contains($this->image, 'http');
        return ($is_Url) ? $this->image : Storage::url($this->image); // add disk('public')-> if you have another disk named 'public' for images
    }
}
