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
        'title_logo',  // Ahora manejará la ruta de la imagen
        'title_home',
        'subtitle_home',
    ];

    protected $casts = [
        // Agrega casts si necesitas
    ];

    // Mutator para title_logo (similar al de News)
    public function setTitleLogoAttribute($value)
    {
        $attribute_name = "title_logo";
        $disk = 'public';
        $destination_path = 'uploads/posts/logos';

        // Si es un archivo subido
        if (is_file($value)) {
            // Elimina la imagen anterior si existe
            if ($this->{$attribute_name}) {
                Storage::disk($disk)->delete($this->{$attribute_name});
            }

            // Guarda el nuevo archivo
            $this->attributes[$attribute_name] = $value->store($destination_path, $disk);
        }
        // Si es un string (al editar sin cambiar la imagen)
        elseif (is_string($value)) {
            $this->attributes[$attribute_name] = $value;
        }
        // Si es null (para eliminar la imagen)
        elseif (is_null($value)) {
            // Elimina la imagen actual si existe
            if ($this->{$attribute_name}) {
                Storage::disk($disk)->delete($this->{$attribute_name});
            }
            $this->attributes[$attribute_name] = null;
        }
    }

    // Accesor para obtener la URL completa
    public function getTitleLogoUrlAttribute()
            {
                if (!$this->title_logo) return null;
                
                // Si ya incluye 'storage/', devolver directamente
                if (strpos($this->title_logo, 'storage/') !== false) {
                    return asset($this->title_logo);
                }
                
                return asset('storage/' . $this->title_logo);
            }
    // O si prefieres mantener el estilo de News:
    public function getTitleLogoURL()
    {
        return $this->title_logo ? Storage::disk('public')->url($this->title_logo) : null;
    }
}