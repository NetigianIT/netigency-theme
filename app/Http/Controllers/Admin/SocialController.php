<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $socials = Social::all();

        return view('admin.contact.social.index', compact('socials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.social.create');
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
            'social_media' => 'required|max:255',
            'link' => 'max:255',
            'status' => 'integer|in:0,1',
        ]);

        $input = $request->all();

        Social::firstOrCreate([
            'social_media' => $input['social_media'],
            'link' => $input['link'],
            'status' => $input['status']
        ]);

        return redirect()->route('social.index')
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
        $social = Social::findOrFail($id);

        return view('admin.contact.social.edit', compact('social'));
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
            'social_media' => 'required|max:255',
            'link' => 'max:255',
            'status' => 'integer|in:0,1',
        ]);

        $input = $request->all();

        Social::find($id)->update($input);

        return redirect()->route('social.index')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status(Request $request, $id)
    {
        $social = Social::findOrFail($id);

        $status = $request->has('status')
            ? (int) $request->input('status')
            : ((int) $social->status === 1 ? 0 : 1);

        $status = $status === 1 ? 1 : 0;
        $social->update(['status' => $status]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'status' => $status,
            ]);
        }

        return redirect()->route('social.index')
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
        $social = Social::find($id);

        $social->delete();

        return redirect()->route('social.index')
            ->with('success', 'content.deleted_successfully');
    }

    /**
     * Remove the checked resources from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy_checked(Request $request)
    {
        $input = $request->input('checked_lists');
        $arr_checked_lists = explode(",", $input);

        if (array_filter($arr_checked_lists) == []) {
            return redirect()->route('social.index')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {
            $social = Social::findOrFail($id);
            $social->delete();
        }

        return redirect()->route('social.index')
            ->with('success', 'content.deleted_successfully');
    }

}
