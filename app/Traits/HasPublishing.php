<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasPublishing
{
    /**
     * Scope a query to only include published items.
     */
    public function scopePublished(Builder $query): void
    {
        $query->where('is_published', true);
    }

    /**
     * Scope a query to only include active items.
     */
    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', true);
    }

    /**
     * Scope a query to order by sort order.
     */
    public function scopeOrdered(Builder $query): void
    {
        $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc');
    }
}

