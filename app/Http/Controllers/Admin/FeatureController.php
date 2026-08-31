<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Feature;
use App\Models\Admin\FeatureSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = getLanguage();
        $features = Feature::where('language_id', $language->id)
            ->orderByRaw("CASE WHEN stack = 'main' THEN 0 ELSE 1 END")
            ->orderBy('order', 'asc')
            ->orderBy('id', 'desc')
            ->get();
        $feature_section = FeatureSection::where('language_id', $language->id)->first();

        return view('admin.feature.index', compact('features', 'feature_section'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.feature.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'stack' => 'required|in:main,supporting',
            'feature_image' => 'required|mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        $input = $request->all();
        $feature_image_name = null;

        if ($request->hasFile('feature_image')) {
            $feature_image = $request->file('feature_image');
            $folder = 'uploads/img/features/';
            $feature_image_name = time().'-'.$feature_image->getClientOriginalName();
            $feature_image->move($folder, $feature_image_name);
        }

        Feature::create([
            'language_id' => getLanguage()->id,
            'type' => 'image',
            'icon' => null,
            'feature_image' => $feature_image_name,
            'title' => $input['title'],
            'desc' => $input['desc'] ?? null,
            'order' => 0,
            'stack' => $input['stack'] ?? 'supporting',
        ]);

        return redirect()->route('feature.index')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature = Feature::findOrFail($id);

        return view('admin.feature.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'stack' => 'required|in:main,supporting',
            'feature_image' => 'nullable|mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        $feature = Feature::findOrFail($id);
        $input = $request->only(['title', 'desc', 'stack']);
        $input['type'] = 'image';
        $input['icon'] = null;

        if ($request->hasFile('feature_image')) {
            $feature_image = $request->file('feature_image');
            $folder = 'uploads/img/features/';
            $feature_image_name = time().'-'.$feature_image->getClientOriginalName();

            if (! empty($feature->feature_image)) {
                File::delete(public_path($folder.$feature->feature_image));
            }

            $feature_image->move($folder, $feature_image_name);
            $input['feature_image'] = $feature_image_name;
        }

        $feature->update($input);

        return redirect()->route('feature.index')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $feature = Feature::findOrFail($id);
        $folder = 'uploads/img/features/';

        if (! empty($feature->feature_image)) {
            File::delete(public_path($folder.$feature->feature_image));
        }

        $feature->delete();

        return redirect()->route('feature.index')
            ->with('success', 'content.deleted_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy_checked(Request $request)
    {
        $input = $request->input('checked_lists');
        $arr_checked_lists = explode(",", $input);

        if (array_filter($arr_checked_lists) == []) {
            return redirect()->route('feature.index')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {
            $feature = Feature::findOrFail($id);
            $folder = 'uploads/img/features/';

            if (! empty($feature->feature_image)) {
                File::delete(public_path($folder.$feature->feature_image));
            }

            $feature->delete();
        }

        return redirect()->route('feature.index')
            ->with('success', 'content.deleted_successfully');
    }
}
