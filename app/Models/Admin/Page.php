<?php

namespace App\Models\Admin;

use App\Traits\Shareable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    use Sluggable;
    use Shareable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'page_slug' => [
                'source' => 'page_title',
                'maxLength'          => null,
                'maxLengthKeepWords' => true,
                'method'             => null,
                'separator'          => '-',
                'unique'             => true,
                'uniqueSuffix'       => null,
                'includeTrashed'     => false,
                'reserved'           => null,
                'onUpdate'           => false
            ]
        ];
    }

    // Share social media
    protected $shareOptions = [
        'columns' => [
            'page_title' => 'page_title'
        ],
        'url' => null
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_id',
        'page_title',
        'desc',
        'display_header_menu',
        'status',
        'order',
        'page_slug',
    ];

    public const MAX_PAGES_PER_LANGUAGE = 8;

    /**
     * Pages that count toward the admin create limit.
     */
    public static function countableForLanguage(int $languageId)
    {
        return static::query()
            ->where('language_id', $languageId);
    }

    /**
     * Active pages for footer (max 8), including header-menu pages like FAQ.
     * First 4 → Customer Relationship, next 4 → Useful Links.
     */
    public static function footerLinksForLanguage(int $languageId, int $limit = self::MAX_PAGES_PER_LANGUAGE)
    {
        return static::query()
            ->where('language_id', $languageId)
            ->where('status', 1)
            ->where('display_header_menu', '!=', 2)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'asc')
            ->limit($limit)
            ->get();
    }
}
