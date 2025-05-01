<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage; // No olvides usar la clase Storage

class Category extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
    ];

    protected static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (empty($model->slug) || $model->isDirty('name')) {
                $model->slug = $model->generateUniqueSlug($model->name);
            }
        });
    }

    public function generateUniqueSlug($name)
    {
        $slug = Str::slug($name);
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

    public function news(): HasMany
    {
        return $this->hasMany(News::class);
    }

    // Este es el método que falta
    public function setImageAttribute($value)
    {
        $attribute_name = "image";
        $disk = 'public';
        $destination_path = 'categories'; // Coincide con el 'prefix' en CategoryCrudController

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