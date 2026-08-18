<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\HomepageVersion;
use Illuminate\Http\Request;

class HomepageVersionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect()->route('fixed-content.create');
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
        HomepageVersion::find($id)->update([
            'choose_version' => 1,
        ]);

        // Forget a single key...
        session()->forget('choose_version');

        return redirect()->route('fixed-content.create')
            ->with('success', 'content.updated_successfully');
    }

}
