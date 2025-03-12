<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Offer extends Model
{
    use HasTranslations;

    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'icon',
        'content',
        'thumbnail',
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
        'short_description' => 'array',
        'content' => 'array',
    ];

    protected $translatable = [
        'title',
        'slug',
        'short_description',
        'content',
    ];


    public function getMetaTitle(): string
    {

        return str_replace(['"', "'"], '', $this->title) . ' - MIXO Expert';
    }

    public function getMetaDesc(): string
    {

        return substr(strip_tags($this->short_description), 0, 150);
    }
}
