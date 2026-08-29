<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\FixedContent;
use Illuminate\Http\Request;

class HeroParticleController extends Controller
{
    /**
     * Show the form for creating / editing hero particles setting.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $language = getLanguage();
        $fixed_content = FixedContent::where('language_id', $language->id)->first();

        return view('admin.setting.particles.create', compact('fixed_content'));
    }

    /**
     * Store particles status when fixed content does not exist yet.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'particles_status' => 'required|integer|in:0,1',
        ]);

        return redirect()->route('hero-particles.create')
            ->with('warning', 'content.hero_content_required_for_particles');
    }

    /**
     * Update the particles status for the current language hero content.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'particles_status' => 'nullable|integer|in:0,1',
        ]);

        $fixed_content = FixedContent::findOrFail($id);
        $fixed_content->update([
            'particles_status' => (int) $request->input('particles_status', 0),
        ]);

        return redirect()->route('hero-particles.create')
            ->with('success', 'content.updated_successfully');
    }
}
