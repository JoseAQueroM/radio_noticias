<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'title_logo',
        'title_home',
        'subtitle_home',
    ];  // <-- Aquí debe ir el punto y coma
}
