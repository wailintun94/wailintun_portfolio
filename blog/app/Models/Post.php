<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    protected function casts(): array
    {
        return [
            'publish_at' => 'datetime',
        ];
    }
    public function getExcerpt() {
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
    public function scopeFeatured($query)
    {
        $query->where('featured', '<=', Carbon::now());
    }
}
