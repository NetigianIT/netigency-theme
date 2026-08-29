<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\VideoCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VideoCategoryController extends Controller
{
    public function create()
    {
        $language = getLanguage();
        $categories = VideoCategory::where('language_id', $language->id)->orderBy('order', 'asc')->orderBy('id', 'desc')->get();

        return view('admin.videos.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|max:255',
            'status' => 'integer|in:0,1',
            'order' => 'required|integer',
        ]);

        VideoCategory::create([
            'language_id' => getLanguage()->id,
            'category_name' => $request->category_name,
            'status' => (int) $request->status,
            'order' => (int) $request->order,
        ]);

        return redirect()->route('video-category.create')
            ->with('success', 'content.created_successfully');
    }

    public function edit($id)
    {
        $category = VideoCategory::findOrFail($id);

        return view('admin.videos.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => [
                'required',
                'max:255',
                Rule::unique('video_categories', 'category_name')->ignore($id)->where(fn ($q) => $q->where('language_id', getLanguage()->id)),
            ],
            'status' => 'integer|in:0,1',
            'order' => 'required|integer',
        ]);

        $category = VideoCategory::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
            'status' => (int) $request->status,
            'order' => (int) $request->order,
        ]);

        return redirect()->route('video-category.create')
            ->with('success', 'content.updated_successfully');
    }

    public function destroy($id)
    {
        VideoCategory::findOrFail($id)->delete();

        return redirect()->route('video-category.create')
            ->with('success', 'content.deleted_successfully');
    }

    public function destroy_checked(Request $request)
    {
        $ids = array_filter(explode(',', (string) $request->checked_lists));

        if (count($ids) === 0) {
            return redirect()->route('video-category.create')
                ->with('warning', 'content.please_choose');
        }

        VideoCategory::whereIn('id', $ids)->delete();

        return redirect()->route('video-category.create')
            ->with('success', 'content.deleted_successfully');
    }
}
