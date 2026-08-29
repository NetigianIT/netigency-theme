<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FixedContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FixedContentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = getLanguage();
        $fixed_content = FixedContent::where('language_id', $language->id)->first();

        return view('admin.banner.fixed_content.create', compact('fixed_content'));
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
            'animated_title_1' => 'nullable|string|max:120',
            'animated_title_2' => 'nullable|string|max:120',
            'animated_title_3' => 'nullable|string|max:120',
            'animated_title_4' => 'nullable|string|max:120',
            'desc' => 'required',
            'image_status' => 'integer|in:0,1',
            'particles_status' => 'integer|in:0,1',
            'thumbnail_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'thumbnail_image_light' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        $input = $request->all();
        $folder = 'uploads/img/general/';

        $input['thumbnail_image'] = $this->storeImage($request, 'thumbnail_image', $folder);
        $input['thumbnail_image_light'] = $this->storeImage($request, 'thumbnail_image_light', $folder);

        FixedContent::firstOrCreate([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'animated_title_1' => $input['animated_title_1'] ?? null,
            'animated_title_2' => $input['animated_title_2'] ?? null,
            'animated_title_3' => $input['animated_title_3'] ?? null,
            'animated_title_4' => $input['animated_title_4'] ?? null,
            'desc' => $input['desc'],
            'btn_name' => $input['btn_name'],
            'btn_link' => $input['btn_link'],
            'image_status' => $input['image_status'],
            'particles_status' => $input['particles_status'] ?? 1,
            'thumbnail_image' => $input['thumbnail_image'],
            'thumbnail_image_light' => $input['thumbnail_image_light'],
        ]);

        return redirect()->route('fixed-content.create')
            ->with('success', 'content.created_successfully');
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
            'animated_title_1' => 'nullable|string|max:120',
            'animated_title_2' => 'nullable|string|max:120',
            'animated_title_3' => 'nullable|string|max:120',
            'animated_title_4' => 'nullable|string|max:120',
            'desc' => 'required',
            'image_status' => 'integer|in:0,1',
            'particles_status' => 'integer|in:0,1',
            'thumbnail_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'thumbnail_image_light' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        $fixed_content = FixedContent::findOrFail($id);
        $input = $request->all();
        $folder = 'uploads/img/general/';

        if ($request->hasFile('thumbnail_image')) {
            $input['thumbnail_image'] = $this->replaceImage(
                $request,
                'thumbnail_image',
                $folder,
                $fixed_content->thumbnail_image
            );
        }

        if ($request->hasFile('thumbnail_image_light')) {
            $input['thumbnail_image_light'] = $this->replaceImage(
                $request,
                'thumbnail_image_light',
                $folder,
                $fixed_content->thumbnail_image_light
            );
        }

        $fixed_content->update($input);

        return redirect()->route('fixed-content.create')
            ->with('success', 'content.updated_successfully');
    }

    private function storeImage(Request $request, string $field, string $folder): ?string
    {
        if (! $request->hasFile($field)) {
            return null;
        }

        $file = $request->file($field);
        $name = time().'-'.$field.'-'.$file->getClientOriginalName();
        $file->move($folder, $name);

        return $name;
    }

    private function replaceImage(Request $request, string $field, string $folder, ?string $old): string
    {
        $file = $request->file($field);
        $name = time().'-'.$field.'-'.$file->getClientOriginalName();

        if (! empty($old)) {
            File::delete(public_path($folder.$old));
        }

        $file->move($folder, $name);

        return $name;
    }
}
