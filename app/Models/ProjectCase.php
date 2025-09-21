<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectCase extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cases';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'case_id',
        'title',
        'client',
        'industry_category_id',
        'period',
        'image',
        'description',
        'content',
        'meta_title',
        'meta_description',
        'result_1',
        'result_2',
        'result_3',
        'result_4',
        'result_5',
        'result_6',
        'before_after',
        'service_key',
        'is_published',
        'sort_order',
        'user_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'before_after' => 'array',
        'is_published' => 'boolean',
    ];


    /**
     * Get the user that owns the case.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope a query to only include published cases.
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    /**
     * Scope a query to filter by industry.
     */
    public function scopeByIndustry($query, $industry)
    {
        return $query->whereHas('industryCategory', function($query) use ($industry) {
            $query->where('slug', $industry);
        });
    }

    /**
     * Scope a query to filter by service key.
     */
    public function scopeByService($query, $serviceKey)
    {
        return $query->where('service_key', $serviceKey);
    }

    /**
     * Scope a query to order cases by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')
                    ->orderBy('created_at', 'desc');
    }

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName()
    {
        return 'case_id';
    }

    /**
     * Get the case's image URL.
     */
    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }

        // Check if it's a legacy static image
        if (in_array($this->image, ['human.jpeg', 'human2.jpeg', 'human.webp'])) {
            return asset('images/' . $this->image);
        }

        // It's an uploaded image - check if it exists in public disk first
        // Check if image path already includes 'images/' prefix
        $imagePath = str_starts_with($this->image, 'images/') ? $this->image : 'images/' . $this->image;

        if (Storage::disk('public')->exists($imagePath)) {
            return asset('storage/' . $imagePath);
        }

        // If not in public, it might be in private disk (legacy Filament behavior)
        if (Storage::disk('local')->exists($this->image)) {
            return asset('storage/' . $this->image);
        }

        return null;
    }

    /**
     * Get the case's excerpt.
     */
    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->description), 120);
    }

    /**
     * Get the case's URL.
     */
    public function getUrlAttribute()
    {
        return route('cases.show', $this->case_id);
    }

    /**
     * Get the industry category for this case.
     */
    public function industryCategory()
    {
        return $this->belongsTo(IndustryCategory::class, 'industry_category_id');
    }

    /**
     * Get industry name in Russian.
     */
    public function getIndustryNameAttribute()
    {
        return $this->industryCategory ? $this->industryCategory->name : 'Без категории';
    }

    /**
     * Get results as array from individual fields.
     */
    public function getResultsArrayAttribute()
    {
        $results = [];
        for ($i = 1; $i <= 6; $i++) {
            $field = "result_{$i}";
            if (!empty($this->$field)) {
                $results[] = $this->$field;
            }
        }
        return $results;
    }

    /**
     * Set results from array to individual fields.
     */
    public function setResultsArrayAttribute($value)
    {
        if (is_array($value)) {
            for ($i = 1; $i <= 6; $i++) {
                $field = "result_{$i}";
                $this->$field = $value[$i - 1] ?? null;
            }
        }
    }

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($case) {
            if (empty($case->case_id)) {
                $case->case_id = 'case-' . Str::slug($case->title) . '-' . time();
            }
        });
    }
}
