<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\VideoCategory;
use App\Models\Admin\VideoItem;

class VideoGalleryController extends Controller
{
    public function index()
    {
        return $this->renderGallery();
    }

    public function category($category_slug)
    {
        $language = getSiteLanguage();

        $category = VideoCategory::where('language_id', $language->id)
            ->where('status', 1)
            ->where('category_slug', $category_slug)
            ->firstOrFail();

        return $this->renderGallery($category);
    }

    private function renderGallery($category = null)
    {
        $language = getSiteLanguage();

        $categories = VideoCategory::where('language_id', $language->id)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->get();

        $videos = VideoItem::with('category')
            ->where('language_id', $language->id)
            ->where('status', 1)
            ->orderBy('order', 'asc')
            ->orderBy('id', 'desc')
            ->get();

        $grouped = $videos->groupBy('category_id');

        return view('frontend.videos.index', compact('categories', 'videos', 'grouped', 'category'));
    }
}
