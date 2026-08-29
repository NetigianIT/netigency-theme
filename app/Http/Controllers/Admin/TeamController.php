<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function index()
    {
        $language = getLanguage();
        $teams = Team::where('language_id', $language->id)->orderBy('id', 'desc')->get();

        return view('admin.team.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'team_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        $input = $request->all();

        if ($request->hasFile('team_image')) {
            $team_image = $request->file('team_image');
            $folder = 'uploads/img/teams/';
            $team_image_name = time().'-'.$team_image->getClientOriginalName();
            $team_image->move($folder, $team_image_name);
            $input['team_image'] = $team_image_name;
        } else {
            $input['team_image'] = null;
        }

        Team::create([
            'language_id' => getLanguage()->id,
            'team_image' => $input['team_image'],
            'name' => $input['name'],
            'job' => $input['job'] ?? null,
            'link_2' => $input['link_2'] ?? null,
            'link_3' => $input['link_3'] ?? null,
            'link_4' => $input['link_4'] ?? null,
            'link_5' => $input['link_5'] ?? null,
            'order' => $input['order'],
        ]);

        return redirect()->route('team.index')
            ->with('success', 'content.created_successfully');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);

        return view('admin.team.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'team_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order' => 'required|integer',
        ]);

        $team = Team::findOrFail($id);
        $input = $request->all();

        if ($request->hasFile('team_image')) {
            $team_image = $request->file('team_image');
            $folder = 'uploads/img/teams/';
            $team_image_name = time().'-'.$team_image->getClientOriginalName();

            if (! empty($team->team_image)) {
                File::delete(public_path($folder.$team->team_image));
            }

            $team_image->move($folder, $team_image_name);
            $input['team_image'] = $team_image_name;
        }

        $team->update($input);

        return redirect()->route('team.index')
            ->with('success', 'content.updated_successfully');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);
        $folder = 'uploads/img/teams/';

        if (! empty($team->team_image)) {
            File::delete(public_path($folder.$team->team_image));
        }

        $team->delete();

        return redirect()->route('team.index')
            ->with('success', 'content.deleted_successfully');
    }

    public function destroy_checked(Request $request)
    {
        $input = $request->input('checked_lists');
        $arr_checked_lists = explode(',', (string) $input);

        if (array_filter($arr_checked_lists) == []) {
            return redirect()->route('team.index')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {
            $team = Team::findOrFail($id);
            $folder = 'uploads/img/teams/';

            if (! empty($team->team_image)) {
                File::delete(public_path($folder.$team->team_image));
            }

            $team->delete();
        }

        return redirect()->route('team.index')
            ->with('success', 'content.deleted_successfully');
    }
}
