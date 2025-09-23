<?php

namespace App\Models;

use App\Contracts\PublishableInterface;
use App\Traits\HasPublishing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model implements PublishableInterface
{
    use HasFactory, HasPublishing;
    protected $fillable = [
        'question',
        'answer',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    /**
     * Check if the FAQ is published.
     */
    public function isPublished(): bool
    {
        return $this->is_active;
    }

    /**
     * Check if the FAQ is active.
     */
    public function isActive(): bool
    {
        return $this->is_active;
    }
}
