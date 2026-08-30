<?php

use App\Support\SiteCache;

$fallback = [

    /*
    |--------------------------------------------------------------------------
    | Pagination Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the paginator library to build
    | the simple pagination links. You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    // Frontend One Group Keyword
    'home' => 'Home',
    'about_us' => 'About Us',
    'services' => 'Services',
    'technology' => 'Technology',
    'portfolio' => 'Portfolio',
    'blogs' => 'Blogs',
    'contact' => 'Contact',
    'pages' => 'Pages',
    'download' => 'Download',
    'read_more' => 'Read More',
    'back_to_home' => 'Back To Home',
    'scroll_down' => 'Scroll Down',
    'service_details' => 'Service Details',
    'recent_posts' => 'Recent Posts',
    'share' => 'Share',
    'all' => 'All',
    'videos' => 'Videos',
    'video_presentations' => 'Video Presentations',
    'updating' => 'Content is being updated. Please check back soon.',
    'do_you_need_a_new_project' => 'Do you need a new project?',
    'get_in_touch' => 'Get In Touch',
    'anonymous' => 'Anonymous',
    'name' => 'Name',
    'email' => 'Email',
    'subject' => 'Subject',
    'message' => 'Message',
    'send_message' => 'Send Message',
    'customer_relationship' => 'Customer Relationship',
    'useful_links' => 'Useful Links',
    'address' => 'Address',
    'phone' => 'Phone',
    'address_map_link' => 'Address Map Link',
    'email_and_phone' => 'Email And Phone',
    'portfolio_details' => 'Portfolio Details',
    'search' => 'Search',
    'search_here' => 'Search Here...',
    'categories' => 'Categories',
    'tags' => 'Tags',
    'leave_a_comment' => 'Leave A Comment',
    'your_name' => 'Your Name',
    'your_email' => 'Your Email',
    'your_comment' => 'Your Comment',
    'send_comment' => 'Send Comment',
    'search_results' => 'Search Results',
    'nothing_found' => 'Nothing Found',
    'your_message_has_been_delivered' => 'Your message has been delivered.',
    'your_comment_is_pending_approval' => 'Your comment is pending approval.',

];

$languageId = session('language_id_from_dropdown') ?: SiteCache::defaultSiteLanguageId();

return array_merge($fallback, SiteCache::frontendKeywords($languageId));
