<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ContactSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'value',
        'type',
        'label',
        'description',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Scope a query to only include active settings.
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
        $query->orderBy('sort_order')->orderBy('label');
    }

    /**
     * Get setting value by key.
     */
    public static function getValue(string $key, $default = null)
    {
        $setting = static::where('key', $key)->active()->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Set setting value by key.
     */
    public static function setValue(string $key, $value): bool
    {
        return static::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        ) !== null;
    }

    /**
     * Get all contact settings as array.
     */
    public static function getAllSettings(): array
    {
        return static::active()
            ->ordered()
            ->pluck('value', 'key')
            ->toArray();
    }
}
