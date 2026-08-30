@extends('layouts.frontend.master')

@section('content')

    <!-- Blog Grid Start -->
    @if (count($blogs) > 0)
        <section class="section pb-minus-76 page-content-offset" id="blog">
            <div class="container">
                <div class="ni-videos-header text-center">
                    <h1 class="ni-videos-title">{{ __('frontend.blogs') }}</h1>
                </div>
                <div class="row">
                    @foreach ($blogs as $blog)
                        <div class="col-md-4">
                            <div class="item">
                                <div class="blog-item">
                                    @if (!empty($blog->blog_image))
                                        <div class="blog-img">
                                            <a href="{{ route('blog-page.show', ['slug' => $blog->slug]) }}">
                                                <img src="{{ asset('uploads/img/blogs/'.$blog->blog_image) }}" alt="Blog image" class="img-fluid" loading="lazy" decoding="async">
                                            </a>
                                        </div>
                                    @else
                                        <div class="blog-img">
                                            <a href="{{ route('blog-page.show', ['slug' => $blog->slug]) }}">
                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="Blog image" class="img-fluid" loading="lazy" decoding="async">
                                            </a>
                                        </div>
                                    @endif
                                    <div class="blog-body">
                                        <div class="blog-meta">
                                            <a href="#"><span><i class="far fa-user"></i>@if ($blog->type == "with_this_account") {{ $blog->author_name }} @else {{ __('frontend.anonymous') }} @endif</span></a>
                                            <a href="#"><span><i class="far fa-bookmark"></i>{{ $blog->category_name }}</span></a>
                                        </div>
                                        <h5>
                                            <a href="{{ route('blog-page.show', ['slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                                        </h5>
                                        @if (!empty($blog->short_desc)) <p>{{ $blog->short_desc }}</p> @endif
                                        <a href="{{ route('blog-page.show', ['slug' => $blog->slug]) }}" class="blog-link">
                                            {{ __('frontend.read_more') }}
                                            <i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="col-xl-12">
                            {{ $blogs->links() }}
                    </div>
                </div>
            </div>
        </section>
    @else
        <section class="section pb-minus-76 page-content-offset" id="blog">
            <div class="container">
                <div class="ni-videos-header text-center">
                    <h1 class="ni-videos-title">{{ __('frontend.blogs') }}</h1>
                </div>
                <div class="ni-videos-empty">
                    <p class="ni-videos-empty__text">{{ __('frontend.updating') }}</p>
                </div>
            </div>
        </section>
    @endif
    <!-- Blog Grid End -->

@endsection
