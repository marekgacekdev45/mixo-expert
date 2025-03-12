<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class ContactPage extends Model
{
    use HasTranslations;

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meta_title',
        'meta_description',
        'hero_image',
        'hero_heading',
        'heading',
        'text',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'meta_title' => 'array',
        'meta_description' => 'array',
        'hero_heading' => 'array',
        'heading' => 'array',
        'text' => 'array',
    ];

    protected $translatable = [
        'meta_title',
        'meta_description',
        'hero_heading',
        'heading',
        'text',
    ];
}
