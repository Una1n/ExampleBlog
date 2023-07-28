<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    use HasFactory;

    /** Fillables */
    protected $fillable = [
        'title',
        'text',
    ];

    protected static function booted(): void
    {
        // Generate unique slug when creating the article
        static::creating(function (Article $article) {
            $slug = str($article->title)->slug()->toString();
            $count = Article::query()->where('slug', 'like', $slug . '-%')
                ->orWhere('slug', '=', $slug)
                ->count();

            if ($count > 0) {
                $slug .= '-' . $count;
            }

            $article->slug = $slug;
        });
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class);
    }

    public function getShortTextAttribute(): string
    {
        return str($this->text)->words(40);
    }

    public function getDateCreatedFormattedAttribute(): string
    {
        return $this->created_at->translatedFormat('F j, Y');
    }

    public function getDateCreatedFormattedDetailAttribute(): string
    {
        return $this->created_at->translatedFormat('F jS, Y');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
