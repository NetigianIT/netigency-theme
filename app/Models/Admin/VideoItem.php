<?php

namespace App\Models\Admin;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoItem extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'language_id',
        'category_id',
        'category_name',
        'title',
        'desc',
        'video_url',
        'provider',
        'video_id',
        'status',
        'order',
        'video_slug',
    ];

    public function sluggable(): array
    {
        return [
            'video_slug' => [
                'source' => 'title',
                'unique' => true,
                'onUpdate' => false,
            ],
        ];
    }

    public function category()
    {
        return $this->belongsTo(VideoCategory::class, 'category_id', 'id');
    }

    /**
     * Embed URL for iframe.
     */
    public function embedUrl(): ?string
    {
        if (empty($this->video_id)) {
            return null;
        }

        if ($this->provider === 'vimeo') {
            return 'https://player.vimeo.com/video/'.$this->video_id;
        }

        return 'https://www.youtube.com/embed/'.$this->video_id;
    }

    /**
     * Thumbnail preview image.
     */
    public function thumbnailUrl(): ?string
    {
        if (empty($this->video_id)) {
            return null;
        }

        if ($this->provider === 'vimeo') {
            return 'https://vumbnail.com/'.$this->video_id.'.jpg';
        }

        return 'https://img.youtube.com/vi/'.$this->video_id.'/hqdefault.jpg';
    }

    /**
     * Parse YouTube or Vimeo URL into provider + id.
     *
     * @return array{provider: string, video_id: string}|null
     */
    public static function parseVideoUrl(string $url): ?array
    {
        $url = trim($url);

        if (preg_match('~(?:youtube\.com/(?:watch\?v=|embed/|shorts/)|youtu\.be/)([A-Za-z0-9_-]{6,})~i', $url, $m)) {
            return ['provider' => 'youtube', 'video_id' => $m[1]];
        }

        if (preg_match('~vimeo\.com/(?:video/)?(\d+)~i', $url, $m)) {
            return ['provider' => 'vimeo', 'video_id' => $m[1]];
        }

        return null;
    }
}
