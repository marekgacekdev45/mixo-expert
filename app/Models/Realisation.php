<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Realisation extends Model
{
    use HasFactory;
    use HasTranslations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'description',
        'gallery',
        'sort',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'array',
        'slug' => 'array',
        'gallery' => 'array',
    ];


    protected $translatable = [
        'title',
        'slug',
        'description',
        'sort',
    ];


    public function getMetaTitle(): string
    {

        return str_replace(['"', "'"], '', $this->title) . ' - MIXO Expert';
    }

    public function getMetaDesc(): string
    {
        if (!empty($this->description)) {
            return substr(strip_tags($this->description), 0, 150);
        }
    
        return str_replace(['"', "'"], '', $this->title) . ' - MIXO Expert';
    }
    
}
