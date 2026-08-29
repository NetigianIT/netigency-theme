<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoCategory extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'language_id',
        'category_name',
        'order',
        'status',
        'category_slug',
    ];

    public function sluggable(): array
    {
        return [
            'category_slug' => [
                'source' => 'category_name',
                'unique' => true,
                'onUpdate' => false,
            ],
        ];
    }

    public function videos()
    {
        return $this->hasMany(VideoItem::class, 'category_id', 'id');
    }
}
