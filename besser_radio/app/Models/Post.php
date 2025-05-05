<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'title_logo',  
        'title_home',
        'subtitle_home',
    ];

    protected $casts = [
    ];

    // Mutator para title_logo (similar al de News)
    public function setTitleLogoAttribute($value)
    {
        $attribute_name = "title_logo";
        $disk = 'public';
        $destination_path = 'uploads/posts/logos';

        if (is_file($value)) {
            if ($this->{$attribute_name}) {
                Storage::disk($disk)->delete($this->{$attribute_name});
            }

            $this->attributes[$attribute_name] = $value->store($destination_path, $disk);
        }
        elseif (is_string($value)) {
            $this->attributes[$attribute_name] = $value;
        }
        elseif (is_null($value)) {
            if ($this->{$attribute_name}) {
                Storage::disk($disk)->delete($this->{$attribute_name});
            }
            $this->attributes[$attribute_name] = null;
        }
    }

    public function getTitleLogoUrlAttribute()
            {
                if (!$this->title_logo) return null;
                
                if (strpos($this->title_logo, 'storage/') !== false) {
                    return asset($this->title_logo);
                }
                
                return asset('storage/' . $this->title_logo);
            }
    public function getTitleLogoURL()
    {
        return $this->title_logo ? Storage::disk('public')->url($this->title_logo) : null;
    }
}