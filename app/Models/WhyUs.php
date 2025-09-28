<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    /** @use HasFactory<\Database\Factories\WhyUsFactory> */
    use HasFactory;

    protected $table = 'why_us';

    protected $fillable = [
        'title',
        'description',
        'icon',
        'color',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Проверяет, активен ли блок
     */
    public function isActive(): bool
    {
        return $this->is_active;
    }

    /**
     * Scope для получения только активных блоков
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope для сортировки по порядку
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('id');
    }

}
