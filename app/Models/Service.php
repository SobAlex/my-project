<?php

namespace App\Models;

use App\Contracts\PublishableInterface;
use App\Traits\HasPublishing;
use App\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model implements PublishableInterface
{
    use HasFactory, HasPublishing, HasSlug;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'icon',
        'color',
        'image',
        'price_from',
        'price_type',
        'features',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'is_published',
        'is_featured',
        'show_on_homepage',
        'sort_order',
        // Связанный контент
        'related_service_1_id',
        'related_service_2_id',
        'related_service_3_id',
        'related_article_1_id',
        'related_article_2_id',
        'related_article_3_id',
        'related_case_1_id',
        'related_case_2_id',
        'related_case_3_id',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_featured' => 'boolean',
        'show_on_homepage' => 'boolean',
        'price_from' => 'decimal:2',
        'features' => 'array',
        'sort_order' => 'integer',
    ];

    /**
     * Check if the service is published.
     */
    public function isPublished(): bool
    {
        return $this->is_published;
    }

    /**
     * Check if the service is active (alias for published).
     */
    public function isActive(): bool
    {
        return $this->is_published;
    }

    /**
     * Check if the service is featured.
     */
    public function isFeatured(): bool
    {
        return $this->is_featured;
    }

    /**
     * Scope a query to only include published services.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope a query to only include featured services.
     */
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    /**
     * Scope a query to only include services shown on homepage.
     */
    public function scopeShowOnHomepage($query)
    {
        return $query->where('show_on_homepage', true);
    }

    /**
     * Scope a query to order services by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('title');
    }

    /**
     * Get the cases associated with this service.
     */
    public function cases(): HasMany
    {
        return $this->hasMany(ProjectCase::class, 'service_key', 'slug');
    }

    /**
     * Get published cases for this service.
     */
    public function publishedCases(): HasMany
    {
        return $this->cases()->where('is_published', true);
    }

    /**
     * Get formatted price string.
     */
    public function getFormattedPriceAttribute(): string
    {
        if (!$this->price_from) {
            return 'По договоренности';
        }

        $price = number_format($this->price_from, 0, ',', ' ') . ' ₽';

        return match($this->price_type) {
            'hour' => "от {$price}/час",
            'month' => "от {$price}/месяц",
            'project' => "от {$price}",
            default => "от {$price}",
        };
    }

    /**
     * Get the URL for this service.
     */
    public function getUrlAttribute(): string
    {
        return route('services.show', $this->slug);
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /**
     * Получает связанные услуги
     */
    public function getRelatedServicesAttribute()
    {
        $serviceIds = array_filter([
            $this->related_service_1_id,
            $this->related_service_2_id,
            $this->related_service_3_id,
        ]);

        if (empty($serviceIds)) {
            return collect();
        }

        return Service::whereIn('id', $serviceIds)
            ->published()
            ->get()
            ->sortBy(function ($service) use ($serviceIds) {
                return array_search($service->id, $serviceIds);
            });
    }

    /**
     * Получает связанные статьи (блоги)
     */
    public function getRelatedArticlesAttribute()
    {
        $articleIds = array_filter([
            $this->related_article_1_id,
            $this->related_article_2_id,
            $this->related_article_3_id,
        ]);

        if (empty($articleIds)) {
            return collect();
        }

        return \App\Models\Blog::whereIn('id', $articleIds)
            ->published()
            ->get()
            ->sortBy(function ($article) use ($articleIds) {
                return array_search($article->id, $articleIds);
            });
    }

    /**
     * Получает связанные кейсы
     */
    public function getRelatedCasesAttribute()
    {
        $caseIds = array_filter([
            $this->related_case_1_id,
            $this->related_case_2_id,
            $this->related_case_3_id,
        ]);

        if (empty($caseIds)) {
            return collect();
        }

        return \App\Models\ProjectCase::whereIn('id', $caseIds)
            ->published()
            ->get()
            ->sortBy(function ($case) use ($caseIds) {
                return array_search($case->id, $caseIds);
            });
    }
}
