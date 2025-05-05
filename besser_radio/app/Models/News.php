<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class News extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'category_id',
        'author_id',
        'title',
        'slug',
        'content',
        'image',
        'publish_date',
        'is_featured',
        'status',
    ];

    protected $casts = [
        'publish_date' => 'datetime',
        'is_featured' => 'boolean',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (empty($model->slug) || $model->isDirty('title')) {
                $model->slug = $model->generateUniqueSlug($model->title);
            }
        });
    }

    public function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (static::where('slug', $slug)
                    ->where('id', '!=', $this->id ?? 0)
                    ->exists()) {
            $slug = $originalSlug.'-'.$count++;
        }

        return $slug;
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = 'public';
        $destination_path = 'uploads';

     
        if (is_file($value)) {
          
            if ($this->{$attribute_name}) {
                Storage::disk($disk)->delete($this->{$attribute_name});
            }

            $this->attributes[$attribute_name] = $value->store($destination_path, $disk);
        }

        if (is_string($value)) {
            $this->attributes[$attribute_name] = $value;
        }

    }

    public function getImageURL()
    {
        return $this->image ? Storage::disk('public')->url($this->image) : null;
    }
}