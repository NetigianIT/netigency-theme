<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Portfolio;
use App\Models\Admin\PortfolioCategory;
use App\Models\Admin\PortfolioDetail;
use App\Models\Admin\PortfolioSection;
use App\Support\DetailSync;
use App\Support\HtmlCleaner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieving models
        $language = getLanguage();
        $portfolios = Portfolio::where('language_id', $language->id)->orderBy('id', 'desc')->get();
        $categories = PortfolioCategory::where('language_id', $language->id)->get();
        $portfolio_section = PortfolioSection::where('language_id', $language->id)->first();

        if (count($categories) > 0) {

            return view('admin.portfolio.index', compact(  'portfolios', 'portfolio_section'));

        } else{

            return redirect()->route('portfolio-category.create')
                ->with('success', 'content.please_create_a_category');

        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Retrieving models
        $language = getLanguage();
        $categories = PortfolioCategory::where('language_id', $language->id)->get();

        if (count($categories) > 0) {

            return view('admin.portfolio.create', compact('categories'));

        } else{

            return redirect()->route('portfolio-category.create')
                ->with('success', 'content.please_create_a_category');

        }

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
            'category_id' => 'integer|required',
            'title' => 'required',
            'thumbnail_image'   =>  'mimes:svg,png,jpeg,jpg|max:2048',
            'order'   =>  'required|integer',
        ], DetailSync::validationRules()));

        // Get All Request
        $input = $request->except('details');

        if($request->hasFile('thumbnail_image')){

            // Get image file
            $thumbnail_image_file = $request->file('thumbnail_image');

            // Folder path
            $folder = 'uploads/img/portfolio/';

            // Make image name
            $thumbnail_image_name = time().'-'.$thumbnail_image_file->getClientOriginalName();

            // Original size upload file
            $thumbnail_image_file->move($folder, $thumbnail_image_name);

            // Set input
            $input['thumbnail_image']= $thumbnail_image_name;

        } else {
            // Set input
            $input['thumbnail_image']= null;
        }

        // Find category
        $category = PortfolioCategory::find($input['category_id']);

        // Record to database
        $portfolio = Portfolio::create([
            'language_id' => getLanguage()->id,
            'category_name' => $category->category_name,
            'category_id' => $input['category_id'],
            'title' => $input['title'],
            'desc' => HtmlCleaner::clean($input['desc']),
            'image_status' => 1,
            'thumbnail_image' => $input['thumbnail_image'],
            'status' => 1,
            'meta_desc' => $input['meta_desc'],
            'meta_keyword' => $input['meta_keyword'],
            'breadcrumb_status' => 0,
            'custom_breadcrumb_image' => null,
            'order' => $input['order']
        ]);

        DetailSync::sync(PortfolioDetail::class, 'portfolio_id', (int) $portfolio->id, $request->input('details', []));

        return redirect()->route('portfolio.index')
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
        // Retrieving models
        $language = getLanguage();
        $portfolio = Portfolio::findOrFail($id);
        $categories = PortfolioCategory::where('language_id', $language->id)->get();
        $portfolio_details = PortfolioDetail::where('portfolio_id', $id)->orderBy('order', 'asc')->orderBy('id', 'asc')->get();

        return view('admin.portfolio.edit', compact('portfolio', 'categories', 'portfolio_details'));
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
            'category_id' => 'integer|required',
            'title' => 'required',
            'thumbnail_image' => 'mimes:svg,png,jpeg,jpg|max:2048',
            'order'   =>  'required|integer',
        ], DetailSync::validationRules()));

        $portfolio = Portfolio::find($id);

        // Get All Request
        $input = $request->except('details', 'breadcrumb_status', 'custom_breadcrumb_image', 'status', 'image_status');
        $input['image_status'] = 1;

        if($request->hasFile('thumbnail_image')){

            // Get image file
            $thumbnail_image_file = $request->file('thumbnail_image');

            // Folder path
            $folder = 'uploads/img/portfolio/';

            // Make image name
            $thumbnail_image_name = time().'-'.$thumbnail_image_file->getClientOriginalName();

            // Delete Image
            File::delete(public_path($folder.$portfolio->thumbnail_image));

            // Original size upload file
            $thumbnail_image_file->move($folder, $thumbnail_image_name);

            // Set input
            $input['thumbnail_image']= $thumbnail_image_name;

        }

        // Find category
        $category = PortfolioCategory::find($input['category_id']);
        $input['category_name'] = $category->category_name;

        // XSS Purifier
        $input['desc'] = HtmlCleaner::clean($input['desc']);

        // Record to database
        Portfolio::find($id)->update($input);

        DetailSync::sync(PortfolioDetail::class, 'portfolio_id', (int) $id, $request->input('details', []));

        return redirect()->route('portfolio.index')
            ->with('success', 'content.updated_successfully');
    }

    /**
     * Toggle publish status from the list (AJAX).
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_status(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);

        $status = $request->has('status')
            ? (int) $request->input('status')
            : ((int) $portfolio->status === 1 ? 0 : 1);

        $status = $status === 1 ? 1 : 0;
        $portfolio->update(['status' => $status]);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'status' => $status,
            ]);
        }

        return redirect()->route('portfolio.index')
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
        $portfolio = Portfolio::find($id);

        // Folder path
        $folder = 'uploads/img/portfolio/breadcrumb/';
        $folder1 = 'uploads/img/portfolio/';

        // Delete Image
        File::delete(public_path($folder.$portfolio->custom_breadcrumb_image));
        File::delete(public_path($folder1.$portfolio->thumbnail_image));

        PortfolioDetail::where('portfolio_id', $portfolio->id)->delete();

        // Delete record
        $portfolio->delete();

        return redirect()->route('portfolio.create')
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
            return redirect()->route('portfolio.create')
                ->with('warning', 'content.please_choose');
        }

        foreach ($arr_checked_lists as $id) {

            // Retrieve a model
            $portfolio = Portfolio::find($id);

            // Folder path
            $folder = 'uploads/img/portfolio/breadcrumb/';
            $folder1 = 'uploads/img/portfolio/';

            // Delete Image
            File::delete(public_path($folder.$portfolio->custom_breadcrumb_image));
            File::delete(public_path($folder1.$portfolio->thumbnail_image));

            PortfolioDetail::where('portfolio_id', $portfolio->id)->delete();

            // Delete record
            $portfolio->delete();

        }

        return redirect()->route('portfolio.create')
            ->with('success', 'content.deleted_successfully');
    }
}
