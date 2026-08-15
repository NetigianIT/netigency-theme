<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;
use App\Models\Admin\Counter;
use App\Models\Admin\Feature;
use App\Models\Admin\Message;
use App\Models\Admin\Page;
use App\Models\Admin\Portfolio;
use App\Models\Admin\Service;
use App\Models\Admin\SkillInfoList;
use App\Models\Admin\Slider;
use App\Models\Admin\Social;
use App\Models\Admin\Subscribe;
use App\Models\Admin\Team;
use App\Models\Admin\Testimonial;
use App\Models\Admin\WorkProcess;
use App\Models\Frontend\Comment;

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
        $services_count = Service::count();
        $counters_count = Counter::count();
        $subscribers_count = Subscribe::count();
        $comments_count = Comment::count();
        $sliders_count = Slider::count();
        $pages_count = Page::count();
        $categories_count = Category::count();
        $socials_count = Social::count();

        return view('admin.dashboard', compact(
            'portfolios_count',
            'features_count',
            'work_processes_count',
            'skills_count',
            'testimonials_count',
            'teams_count',
            'blogs_count',
            'messages_count',
            'services_count',
            'counters_count',
            'subscribers_count',
            'comments_count',
            'sliders_count',
            'pages_count',
            'categories_count',
            'socials_count'
        ));
    }
}
