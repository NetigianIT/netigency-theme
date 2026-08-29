<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public const CODE_ENGLISH = 'en';

    /**
     * Fixed site languages. Extra rows in the database are ignored.
     *
     * @var list<string>
     */
    public const SUPPORTED_CODES = [
        self::CODE_ENGLISH,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_name',
        'language_code',
        'direction',
        'status',
        'display_dropdown',
        'default_site_language',
    ];

    public function scopeSupported(Builder $query): Builder
    {
        return $query->whereIn('language_code', self::SUPPORTED_CODES)
            ->orderByRaw("CASE language_code WHEN 'en' THEN 0 ELSE 1 END");
    }

    public function isSupported(): bool
    {
        return in_array($this->language_code, self::SUPPORTED_CODES, true);
    }
}
