<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\VideoCategory;
use App\Models\Admin\VideoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class VideoItemController extends Controller
{
    public function index()
    {
        $language = getLanguage();
        $videos = VideoItem::where('language_id', $language->id)->orderBy('order', 'asc')->orderBy('id', 'desc')->get();

        return view('admin.videos.item.index', compact('videos'));
    }

    public function create()
    {
        $language = getLanguage();
        $categories = VideoCategory::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();

        if ($categories->isEmpty()) {
            return redirect()->route('video-category.create')
                ->with('success', 'content.please_create_a_category');
        }

        return view('admin.videos.item.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'title' => 'required|max:255',
            'video_url' => 'required|url|max:500',
            'thumbnail_image' => 'nullable|mimes:svg,png,jpeg,jpg,webp|max:2048',
            'desc' => 'nullable|string',
            'status' => 'integer|in:0,1',
            'order' => 'required|integer',
        ]);

        $parsed = VideoItem::parseVideoUrl($request->video_url);
        if (! $parsed) {
            return back()->withInput()->withErrors([
                'video_url' => 'Please enter a valid YouTube or Vimeo URL.',
            ]);
        }

        $category = VideoCategory::findOrFail($request->category_id);
        $thumbnailImage = null;

        if ($request->hasFile('thumbnail_image')) {
            $folder = 'uploads/img/videos/';
            if (! File::isDirectory(public_path($folder))) {
                File::makeDirectory(public_path($folder), 0755, true);
            }
            $file = $request->file('thumbnail_image');
            $thumbnailImage = time().'-'.$file->getClientOriginalName();
            $file->move(public_path($folder), $thumbnailImage);
        }

        VideoItem::create([
            'language_id' => getLanguage()->id,
            'category_id' => $category->id,
            'category_name' => $category->category_name,
            'title' => $request->title,
            'desc' => $request->desc,
            'video_url' => $request->video_url,
            'provider' => $parsed['provider'],
            'video_id' => $parsed['video_id'],
            'thumbnail_image' => $thumbnailImage,
            'status' => (int) $request->status,
            'order' => (int) $request->order,
        ]);

        return redirect()->route('video-item.index')
            ->with('success', 'content.created_successfully');
    }

    public function edit($id)
    {
        $language = getLanguage();
        $video = VideoItem::findOrFail($id);
        $categories = VideoCategory::where('language_id', $language->id)->where('status', 1)->orderBy('order', 'asc')->get();

        return view('admin.videos.item.edit', compact('video', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|integer',
            'title' => 'required|max:255',
            'video_url' => 'required|url|max:500',
            'thumbnail_image' => 'nullable|mimes:svg,png,jpeg,jpg,webp|max:2048',
            'desc' => 'nullable|string',
            'status' => 'integer|in:0,1',
            'order' => 'required|integer',
        ]);

        $parsed = VideoItem::parseVideoUrl($request->video_url);
        if (! $parsed) {
            return back()->withInput()->withErrors([
                'video_url' => 'Please enter a valid YouTube or Vimeo URL.',
            ]);
        }

        $video = VideoItem::findOrFail($id);
        $category = VideoCategory::findOrFail($request->category_id);
        $thumbnailImage = $video->thumbnail_image;

        if ($request->hasFile('thumbnail_image')) {
            $folder = 'uploads/img/videos/';
            if (! File::isDirectory(public_path($folder))) {
                File::makeDirectory(public_path($folder), 0755, true);
            }

            if (! empty($video->thumbnail_image)) {
                File::delete(public_path($folder.$video->thumbnail_image));
            }

            $file = $request->file('thumbnail_image');
            $thumbnailImage = time().'-'.$file->getClientOriginalName();
            $file->move(public_path($folder), $thumbnailImage);
        }

        $video->update([
            'category_id' => $category->id,
            'category_name' => $category->category_name,
            'title' => $request->title,
            'desc' => $request->desc,
            'video_url' => $request->video_url,
            'provider' => $parsed['provider'],
            'video_id' => $parsed['video_id'],
            'thumbnail_image' => $thumbnailImage,
            'status' => (int) $request->status,
            'order' => (int) $request->order,
        ]);

        return redirect()->route('video-item.index')
            ->with('success', 'content.updated_successfully');
    }

    public function destroy($id)
    {
        $video = VideoItem::findOrFail($id);

        if (! empty($video->thumbnail_image)) {
            File::delete(public_path('uploads/img/videos/'.$video->thumbnail_image));
        }

        $video->delete();

        return redirect()->route('video-item.index')
            ->with('success', 'content.deleted_successfully');
    }

    public function destroy_checked(Request $request)
    {
        $ids = array_filter(explode(',', (string) $request->checked_lists));

        if (count($ids) === 0) {
            return redirect()->route('video-item.index')
                ->with('warning', 'content.please_choose');
        }

        $videos = VideoItem::whereIn('id', $ids)->get();
        foreach ($videos as $video) {
            if (! empty($video->thumbnail_image)) {
                File::delete(public_path('uploads/img/videos/'.$video->thumbnail_image));
            }
            $video->delete();
        }

        return redirect()->route('video-item.index')
            ->with('success', 'content.deleted_successfully');
    }
}
