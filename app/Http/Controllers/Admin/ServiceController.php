<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use App\Models\Admin\ServiceDetail;
use App\Models\Admin\ServicePaginate;
use App\Models\Admin\ServiceSection;
use App\Support\DetailSync;
use App\Support\HtmlCleaner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving a model
        $language = getLanguage();
        $services = Service::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $service_section = ServiceSection::where('language_id', $language->id)->first();

        return view('admin.service.index', compact('services', 'service_section'));

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
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
        $request->validate(array_merge([
            'title' => 'required',
            'order' => 'required|integer',
            'status'   =>  'integer|in:0,1',
            'service_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ], DetailSync::validationRules()));

        // Get All Request
        $input = $request->except('details');

        if($request->hasFile('service_image')){

            // Get image file
            $service_image_file = $request->file('service_image');

            // Folder path
            $folder = 'uploads/img/service/';

            // Make image name
            $service_image_name = time().'-'.$service_image_file->getClientOriginalName();

            // Original size upload file
            $service_image_file->move($folder, $service_image_name);

            // Set input
            $input['service_image']= $service_image_name;

        } else {
            // Set input
            $input['service_image']= null;
        }

        // Record to database
        $service = Service::create([
            'language_id' => getLanguage()->id,
            'title' => $input['title'],
            'desc' => HtmlCleaner::clean($input['desc']),
            'short_desc' => null,
            'icon' => $input['icon'],
            'image_status' => 'enable',
            'service_image' => $input['service_image'],
            'meta_desc' => $input['meta_desc'],
            'meta_keyword' => $input['meta_keyword'],
            'breadcrumb_status' => 0,
            'custom_breadcrumb_image' => null,
            'status' => (int) ($input['status'] ?? 0),
            'order' => $input['order']
        ]);

        DetailSync::sync(ServiceDetail::class, 'service_id', (int) $service->id, $request->input('details', []));

        return redirect()->route('service.index')
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
        $service = Service::findOrFail($id);
        $service_details = ServiceDetail::where('service_id', $id)->orderBy('order', 'asc')->orderBy('id', 'asc')->get();

        return view('admin.service.edit', compact('service', 'service_details'));
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
        $request->validate(array_merge([
            'title' => 'required',
            'order' => 'required|integer',
            'status'   =>  'integer|in:0,1',
            'service_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
        ], DetailSync::validationRules()));

        $service = Service::find($id);

        // Get All Request
        $input = $request->except('details');
        $input['image_status'] = 'enable';

        if($request->hasFile('service_image')){

            // Get image file
            $service_image_file = $request->file('service_image');

            // Folder path
            $folder = 'uploads/img/service/';

            // Make image name
            $service_image_name = time().'-'.$service_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$service->service_image));

            // Original size upload file
            $service_image_file->move($folder, $service_image_name);

            // Set input
            $input['service_image'] = $service_image_name;

        }

        // XSS Purifier
        $input['desc'] = HtmlCleaner::clean($input['desc']);

        // Record to database
        Service::find($id)->update($input);

        DetailSync::sync(ServiceDetail::class, 'service_id', (int) $id, $request->input('details', []));

        return redirect()->route('service.index')
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
        // Retrieve a model
        $service = Service::find($id);

        // Folder path
        $folder = 'uploads/img/service/';
        $folder2 = 'uploads/img/service/breadcrumb/';

        // Delete Image
        File::delete(public_path($folder.$service->service_image));
        File::delete(public_path($folder2.$service->custom_breadcrumb_image));

        ServiceDetail::where('service_id', $service->id)->delete();

        // Delete record
        $service->delete();

        return redirect()->route('service.index')
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
        // Get All Request
        $input = $request->input('checked_lists');

        $arr_checked_lists = explode(",", $input);

        if (array_filter($arr_checked_lists) == []) {
            return redirect()->route('service.index')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $service = Service::findOrFail($id);

            // Folder path
            $folder = 'uploads/img/service/';
            $folder2 = 'uploads/img/service/breadcrumb/';

            // Delete Image
            File::delete(public_path($folder.$service->service_image));
            File::delete(public_path($folder2.$service->custom_breadcrumb_image));

            ServiceDetail::where('service_id', $service->id)->delete();

            // Delete record
            $service->delete();

        }

        return redirect()->route('service.index')
            ->with('success', 'content.deleted_successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_paginate()
    {
        // Retrieving a model
        $service_paginate= ServicePaginate::first();

        return view('admin.service.paginate.create', compact('service_paginate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_paginate(Request $request)
    {
        // Form validation
        $request->validate([
            'homepage_item' => 'integer|required',
            'paginate' => 'integer|required',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        ServicePaginate::firstOrCreate([
            'homepage_item' => $input['homepage_item'],
            'paginate' => $input['paginate']
        ]);

        return redirect()->route('service-paginate.create_paginate')
            ->with('success', 'content.created_successfully');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_paginate(Request $request, $id)
    {
        // Form validation
        $request->validate([
            'homepage_item' => 'integer|required',
            'paginate' => 'integer|required',
        ]);

        // Get All Request
        $input = $request->all();

        // Update model
        ServicePaginate::find($id)->update($input);

        return redirect()->route('service-paginate.create_paginate')
            ->with('success', 'content.updated_successfully');
    }

}
