<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Translatable\HasTranslations;

class Home extends Model
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
        'og_image',
        'keywords',
        'scripts_head_top',
        'scripts_head_bottom',
        'scripts_body_top',
        'name',
        'logo',
        'address',
        'city',
        'phone',
        'email',
        'nip',
        'google_map',
        'google_link',
        'hero_heading',
        'hero_text',
        'hero_image',
        'hero_background',
        'offer_subheading',
        'offer_heading',
        'offer_text',
        'about_subheading',
        'about_heading',
        'about_text',
        'about_image',
        'about_background',
        'realisations_subheading',
        'realisations_heading',
        'realisations_text',
        'realisations_image',
        'realisations_background',
        'cooperation_subheading',
        'cooperation_heading',
        'cooperation_text',
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
        'keywords' => 'array',
        'name' => 'array',
        'hero_heading' => 'array',
        'hero_text' => 'array',
        'offer_subheading' => 'array',
        'offer_heading' => 'array',
        'offer_text' => 'array',
        'about_subheading' => 'array',
        'about_heading' => 'array',
        'about_text' => 'array',
        'realisations_subheading' => 'array',
        'realisations_heading' => 'array',
        'realisations_text' => 'array',
        'cooperation_subheading' => 'array',
        'cooperation_heading' => 'array',
        'cooperation_text' => 'array',
    ];

    public function socials(): HasMany
    {
        return $this->hasMany(Social::class);
    }


    protected $translatable = [
        'meta_title',
        'meta_description',
        'keywords',
        'name',
        'hero_heading',
        'hero_text',
        'hero_image',
        'hero_background',
        'offer_subheading',
        'offer_heading',
        'offer_text',
        'about_subheading',
        'about_heading',
        'about_text',
        'about_image',
        'about_background',
        'realisations_subheading',
        'realisations_heading',
        'realisations_text',
        'realisations_image',
        'realisations_background',
        'cooperation_subheading',
        'cooperation_heading',
        'cooperation_text',
    ];
}
