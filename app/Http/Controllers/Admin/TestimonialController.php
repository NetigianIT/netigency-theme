<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Testimonial;
use App\Models\Admin\TestimonialSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = getLanguage();
        $testimonials = Testimonial::where('language_id', $language->id)->orderBy('id', 'asc')->get();
        $testimonial_section = TestimonialSection::where('language_id', $language->id)->first();

        return view('admin.testimonial.index', compact('testimonials', 'testimonial_section'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonial.create');
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
            'name' => 'required',
            'job' => 'required',
            'desc' => 'required',
            'star' => 'required|integer|in:1,2,3,4,5',
            'testimonial_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        $input = $request->except('image_status');

        if ($request->hasFile('testimonial_image')) {
            $testimonial_image = $request->file('testimonial_image');
            $folder = 'uploads/img/testimonials/';
            $testimonial_image_name = time().'-'.$testimonial_image->getClientOriginalName();
            $testimonial_image->move($folder, $testimonial_image_name);
            $input['testimonial_image'] = $testimonial_image_name;
        } else {
            $input['testimonial_image'] = null;
        }

        Testimonial::create([
            'language_id' => getLanguage()->id,
            'image_status' => 1,
            'testimonial_image' => $input['testimonial_image'],
            'name' => $input['name'],
            'job' => $input['job'],
            'desc' => $input['desc'],
            'star' => $input['star'],
            'order' => $input['order'],
        ]);

        return redirect()->route('testimonial.index')
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
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.testimonial.edit', compact('testimonial'));
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
            'name' => 'required',
            'job' => 'required',
            'desc' => 'required',
            'star' => 'integer|in:1,2,3,4,5',
            'testimonial_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $input = $request->except('image_status');
        $input['image_status'] = 1;

        if ($request->hasFile('testimonial_image')) {
            $testimonial_image = $request->file('testimonial_image');
            $folder = 'uploads/img/testimonials/';
            $testimonial_image_name = time().'-'.$testimonial_image->getClientOriginalName();

            if (! empty($testimonial->testimonial_image)) {
                File::delete(public_path($folder.$testimonial->testimonial_image));
            }

            $testimonial_image->move($folder, $testimonial_image_name);
            $input['testimonial_image'] = $testimonial_image_name;
        }

        $testimonial->update($input);

        return redirect()->route('testimonial.index')
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
        $testimonial = Testimonial::findOrFail($id);
        $folder = 'uploads/img/testimonials/';

        if (! empty($testimonial->testimonial_image)) {
            File::delete(public_path($folder.$testimonial->testimonial_image));
        }

        $testimonial->delete();

        return redirect()->route('testimonial.index')
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
        $arr_checked_lists = explode(',', $input);

        if (array_filter($arr_checked_lists) == []) {
            return redirect()->route('testimonial.index')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {
            $testimonial = Testimonial::findOrFail($id);
            $folder = 'uploads/img/testimonials/';

            if (! empty($testimonial->testimonial_image)) {
                File::delete(public_path($folder.$testimonial->testimonial_image));
            }

            $testimonial->delete();
        }

        return redirect()->route('testimonial.index')
            ->with('success', 'content.deleted_successfully');
    }
}
