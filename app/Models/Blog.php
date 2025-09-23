<?php

namespace App\Models;

use App\Contracts\ImageableInterface;
use App\Contracts\PublishableInterface;
use App\Traits\HasImage;
use App\Traits\HasPublishing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Blog extends Model implements ImageableInterface, PublishableInterface
{
    use HasFactory, HasImage, HasPublishing;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'image',
        'category_id',
        'meta_title',
        'meta_description',
        'is_published',
        'sort_order',
        'user_id',
        'published_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Get the user that owns the blog post.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the blog category that owns the blog post.
     */
    public function blogCategory(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    /**
     * Scope a query to filter by category.
     */
    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    /**
     * Check if the blog post is published.
     */
    public function isPublished(): bool
    {
        return $this->is_published;
    }

    /**
     * Check if the blog post is active.
     */
    public function isActive(): bool
    {
        return $this->is_published;
    }

    /**
     * Get the image attribute.
     */
    public function getImageAttribute(): ?string
    {
        return $this->attributes['image'] ?? null;
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Generate slug from title.
     */
    public function generateSlug()
    {
        $this->slug = Str::slug($this->title);
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            if (empty($blog->slug) && !empty($blog->title)) {
                $blog->slug = Str::slug($blog->title);
            }
        });

        static::updating(function ($blog) {
            if (empty($blog->slug) && !empty($blog->title)) {
                $blog->slug = Str::slug($blog->title);
            }
        });
    }

    /**
     * Get the category name from related BlogCategory.
     */
    public function getCategoryNameAttribute()
    {
        return $this->blogCategory ? $this->blogCategory->name : 'Без категории';
    }

    /**
     * Get the formatted published date.
     */
    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at ? $this->published_at->format('d.m.Y') : null;
    }

}
