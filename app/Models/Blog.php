<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Blog extends Model
{
    use HasFactory;

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
        'category',
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
        return $this->belongsTo(BlogCategory::class, 'category', 'slug');
    }

    /**
     * Scope a query to only include published blog posts.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope a query to filter by category.
     */
    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    /**
     * Scope a query to order blog posts by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('published_at', 'desc');
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
     * Get the category name in Russian.
     */
    public function getCategoryNameAttribute()
    {
        return match($this->category) {
            'seo-news' => 'SEO новости',
            'analytics' => 'Аналитика',
            'tips' => 'Советы',
            default => ucfirst($this->category)
        };
    }

    /**
     * Get the formatted published date.
     */
    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at ? $this->published_at->format('d.m.Y') : null;
    }
}
