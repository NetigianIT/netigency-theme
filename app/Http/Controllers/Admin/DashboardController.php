<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Feature;
use App\Models\Admin\Message;
use App\Models\Admin\Portfolio;
use App\Models\Admin\SkillInfoList;
use App\Models\Admin\Team;
use App\Models\Admin\Testimonial;
use App\Models\Admin\WorkProcess;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios_count = Portfolio::count();
        $features_count = Feature::count();
        $work_processes_count = WorkProcess::count();
        $skills_count = SkillInfoList::count();
        $testimonials_count = Testimonial::count();
        $teams_count = Team::count();
        $blogs_count = Blog::count();
        $messages_count = Message::count();

        $site_name = config('app.name', 'Netigian IT');

        return view('admin.dashboard', compact(
            'portfolios_count',
            'features_count',
            'work_processes_count',
            'skills_count',
            'testimonials_count',
            'teams_count',
            'blogs_count',
            'messages_count',
            'site_name'
        ));
    }
}
