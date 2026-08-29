<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FixedContent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'title',
        'animated_title_1',
        'animated_title_2',
        'animated_title_3',
        'animated_title_4',
        'desc',
        'btn_name',
        'btn_link',
        'image_status',
        'particles_status',
        'thumbnail_image',
        'thumbnail_image_light',
    ];

    /**
     * Non-empty animated title phrases for the hero typewriter.
     *
     * @return list<string>
     */
    public function animatedTitles(): array
    {
        return array_values(array_filter([
            $this->animated_title_1,
            $this->animated_title_2,
            $this->animated_title_3,
            $this->animated_title_4,
        ], static fn ($value) => filled($value)));
    }
}
