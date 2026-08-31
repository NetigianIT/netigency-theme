<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Skill;
use App\Models\Admin\SkillInfoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SkillController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = getLanguage();
        $skill = Skill::where('language_id', $language->id)->first();

        return view('admin.skill.create', compact('skill'));
    }

    /**
     * Skill information list (separate from section create/edit).
     *
     * @return \Illuminate\Http\Response
     */
    public function info_list()
    {
        $language = getLanguage();
        $info_lists = SkillInfoList::where('language_id', $language->id)->orderBy('id', 'desc')->get();

        return view('admin.skill.info-list', compact('info_lists'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation
        $request->validate([
            'title' => 'required',
            'skill_image' => 'required|image|mimes:svg,png,jpeg,jpg|max:2048',
            'skill_image_light' => 'nullable|image|mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        // Get All Request
        $input = $request->all();
        $folder = 'uploads/img/skill/';

        if($request->hasFile('skill_image')){

            // Get image file
            $skill_image_file = $request->file('skill_image');

            // Make image name
            $skill_image_name = time().'-dark-'.$skill_image_file->getClientOriginalName();

            // Original size upload file
            $skill_image_file->move($folder, $skill_image_name);

            // Set input
            $input['skill_image']= $skill_image_name;

        }

        $input['skill_image_light'] = null;
        if ($request->hasFile('skill_image_light')) {
            $light = $request->file('skill_image_light');
            $lightName = time().'-light-'.$light->getClientOriginalName();
            $light->move($folder, $lightName);
            $input['skill_image_light'] = $lightName;
        }

        // Record to database
        Skill::firstOrCreate([
            'language_id' => getLanguage()->id,
            'section_title' => __('frontend.technology'),
            'title' => $input['title'],
            'desc' => $input['desc'],
            'skill_image' => $input['skill_image'],
            'skill_image_light' => $input['skill_image_light'],
        ]);

        return redirect()->route('skill.create')
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
        // Form validation
        $request->validate([
            'title' => 'required',
            'skill_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'skill_image_light' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ]);

        $skill = Skill::find($id);

        // Get All Request
        $input = $request->except('section_title');
        $input['section_title'] = __('frontend.technology');
        $folder = 'uploads/img/skill/';

        if($request->hasFile('skill_image')){

            // Get image file
            $skill_image_file = $request->file('skill_image');

            // Make image name
            $skill_image_name =  time().'-dark-'.$skill_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$skill->skill_image));

            // Original size upload file
            $skill_image_file->move($folder, $skill_image_name);

            // Set input
            $input['skill_image']= $skill_image_name;

        }

        if ($request->hasFile('skill_image_light')) {
            $light = $request->file('skill_image_light');
            $lightName = time().'-light-'.$light->getClientOriginalName();
            if (! empty($skill->skill_image_light)) {
                File::delete(public_path($folder.$skill->skill_image_light));
            }
            $light->move($folder, $lightName);
            $input['skill_image_light'] = $lightName;
        }

        // Update model
        Skill::find($id)->update($input);

        return redirect()->route('skill.create')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_info_list(Request $request)
    {
        // Form validation
        $request->validate([
            'title' => 'required',
            'percent_rate' => 'required|integer',
            'order' => 'required|integer',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        SkillInfoList::create([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'percent_rate' => $input['percent_rate'],
            'order' => $input['order']
        ]);

        return redirect()->route('skill.info_list')
            ->with('success', 'content.created_successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_info_list($id)
    {
        $info_list = SkillInfoList::findOrFail($id);

        return view('admin.skill.edit', compact('info_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_info_list(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'percent_rate' => 'required|integer',
            'order' => 'integer',
        ]);

        $input = $request->all();
        SkillInfoList::findOrFail($id)->update($input);

        return redirect()->route('skill.info_list')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_info_list($id)
    {
        $info_list = SkillInfoList::findOrFail($id);
        $info_list->delete();

        return redirect()->route('skill.info_list')
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
            return redirect()->route('skill.info_list')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {
            $info_list = SkillInfoList::findOrFail($id);
            $info_list->delete();
        }

        return redirect()->route('skill.info_list')
            ->with('success', 'content.deleted_successfully');
    }

}
