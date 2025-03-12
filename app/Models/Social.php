<?php

namespace App\Models;

use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Social extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'link',
        'home_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'home_id' => 'integer',
    ];

    public function home(): BelongsTo
    {
        return $this->belongsTo(Home::class);
    }

    public static function getForm(): array{
        return [
            Select::make('name')
                ->label('Platforma')
                ->required()
                ->disableOptionsWhenSelectedInSiblingRepeaterItems()
                ->live()
                ->searchable()
                ->preload()
                ->options([
                    'facebook' => 'Facebook',
                    'instagram' => 'Instagram',
                    'twitter' => 'X/Twitter',
                    'tiktok' => 'TikTok',
                    'youtube' => 'YouTube',
                    'linkedin' => 'LinkedIn',
                    'tripadvisor' => 'TripAdvisor',
                    'telegram' => 'Telegram',
                ]),


            TextInput::make('link')
                ->label('Link')
                ->required()
                ->minLength(3)
                ->url()
                
                ->placeholder('https://www.instagram.com/marketingmix_pl/'),

               
        ];}
}
