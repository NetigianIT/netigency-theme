@extends('layouts.frontend.master')

@section('content')
@php
    $authorName = ($blog->type == 'with_this_account' && !empty($blog->author_name))
        ? $blog->author_name
        : __('frontend.anonymous');
    $shortDesc = $blog->short_desc
        ?: ($blog->meta_desc ?? null)
        ?: \Illuminate\Support\Str::limit(trim(preg_replace('/\s+/', ' ', strip_tags(html_entity_decode($blog->desc)))), 160);
    $techTags = !empty($blog->tag)
        ? array_values(array_filter(array_map('trim', explode(',', $blog->tag))))
        : [];
    $readMinutes = max(1, (int) ceil(str_word_count(strip_tags(html_entity_decode($blog->desc))) / 200));
    $sideItems = collect($recent_posts ?? []);
@endphp

    <section class="section page-content-offset ni-detail-page ni-detail-page--blog" id="blog-sidebar-page">
        <div class="container">
            <div class="ni-detail-hero">
                <div class="ni-detail-hero__text">
                    <h1 class="ni-detail-hero__title">{{ $blog->title }}</h1>
                    @if (!empty($shortDesc))
                        <p class="ni-detail-hero__lead">{{ $shortDesc }}</p>
                    @endif
                </div>
                <div class="ni-detail-hero__actions">
                    <a class="ni-detail-btn ni-detail-btn--primary" href="{{ route('blog-page.index') }}">
                        <span>{{ __('frontend.blogs') }}</span>
                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                    </a>
                    <a class="ni-detail-back" href="{{ route('blog-page.index') }}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        <span>Back to Blogs</span>
                    </a>
                </div>
            </div>

            <div class="ni-detail-meta">
                <div class="ni-detail-meta__item">
                    <span class="ni-detail-meta__label">Author</span>
                    <span class="ni-detail-meta__value">{{ $authorName }}</span>
                </div>
                <div class="ni-detail-meta__item">
                    <span class="ni-detail-meta__label">Date</span>
                    <span class="ni-detail-meta__value">{{ \Carbon\Carbon::parse($blog->created_at)->format('F Y') }}</span>
                </div>
                <div class="ni-detail-meta__item">
                    <span class="ni-detail-meta__label">Category</span>
                    <span class="ni-detail-meta__value">{{ $blog->category_name }}</span>
                </div>
                <div class="ni-detail-meta__item">
                    <span class="ni-detail-meta__label">Read Time</span>
                    <span class="ni-detail-meta__value">{{ $readMinutes }} min</span>
                </div>
            </div>

            <div class="row ni-detail-media">
                <div class="col-lg-7">
                    <div class="ni-detail-media__main">
                        @if (!empty($blog->blog_image) && ($blog->image_status ?? 'enable') != 'disable')
                            <img src="{{ asset('uploads/img/blogs/'.$blog->blog_image) }}" alt="{{ $blog->title }}" class="img-fluid" fetchpriority="high" decoding="async">
                        @else
                            <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="{{ $blog->title }}" class="img-fluid">
                        @endif
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="ni-detail-media__side">
                        @if ($sideItems->count() > 0)
                            <div class="owl-carousel owl-theme ni-detail-side-carousel" id="blogSideCarousel">
                                @foreach ($sideItems as $recent_post)
                                    <div class="item">
                                        <a class="ni-detail-side-card" href="{{ route('blog-page.show', ['slug' => $recent_post->slug]) }}">
                                            @if (!empty($recent_post->blog_image))
                                                <img src="{{ asset('uploads/img/blogs/'.$recent_post->blog_image) }}" alt="{{ $recent_post->title }}" class="img-fluid" loading="lazy" decoding="async">
                                            @else
                                                <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="{{ $recent_post->title }}" class="img-fluid" loading="lazy" decoding="async">
                                            @endif
                                            <div class="ni-detail-side-card__overlay">
                                                <span>Recent</span>
                                                <h4>{{ $recent_post->title }}</h4>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="ni-detail-side-panel ni-detail-side-panel--empty">
                                <div class="ni-detail-wire">
                                    <span></span><span></span><span></span>
                                </div>
                                <p>{{ $blog->category_name }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="ni-detail-body">
                <h2 class="ni-detail-body__title">
                    <i class="fas fa-newspaper" aria-hidden="true"></i>
                    <span>{{ $blog->title }}</span>
                </h2>

                <div class="ni-detail-body__block">
                    <h3 class="ni-detail-body__label">Overview</h3>
                    <div class="ni-detail-body__content">
                        @php echo html_entity_decode($blog->desc); @endphp
                    </div>
                </div>

                @if (count($techTags) > 0)
                    <div class="ni-detail-body__block">
                        <h3 class="ni-detail-body__label">{{ __('frontend.tags') }}</h3>
                        <div class="ni-detail-tags">
                            @foreach ($techTags as $tag)
                                <span class="ni-detail-tag">{{ $tag }}</span>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="ni-detail-share">
                    <span class="ni-detail-share__label">{{ __('frontend.share') }}</span>
                    <a href="{{ $blog->getShareUrl('twitter') }}" target="_blank" rel="noopener noreferrer" aria-label="Share on Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="{{ $blog->getShareUrl('whatsapp') }}" target="_blank" rel="noopener noreferrer" aria-label="Share on WhatsApp"><i class="fab fa-whatsapp"></i></a>
                    <a href="{{ $blog->getShareUrl('pinterest') }}" target="_blank" rel="noopener noreferrer" aria-label="Share on Pinterest"><i class="fab fa-pinterest"></i></a>
                </div>

                <div class="ni-detail-newsletter">
                    <div class="ni-detail-newsletter__icon"><i class="fa fa-envelope-open-text"></i></div>
                    <div class="ni-detail-newsletter__text">
                        <h5>{{ __('frontend.subscribe_newsletter') }}</h5>
                        <p>Receive the latest news updates</p>
                    </div>
                    <form class="ni-detail-newsletter__form" action="{{ route('subscribe-section.store') }}" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="{{ __('frontend.enter_email') }}" required>
                        <button type="submit" aria-label="Subscribe"><i class="fa fa-arrow-right"></i></button>
                    </form>
                </div>

                <div class="ni-detail-comments">
                    @if (count($comments) > 0)
                        <h5 class="ni-detail-comments__title">{{ __('frontend.comments') }} ({{ count($comments) }})</h5>
                        @foreach ($comments as $comment)
                            <div class="ni-detail-comment">
                                <div class="ni-detail-comment__avatar"><i class="fas fa-user"></i></div>
                                <div class="ni-detail-comment__body">
                                    <h6>{{ $comment->name }}</h6>
                                    <span>{{ \Carbon\Carbon::parse($comment->created_at)->format('d M Y') }}</span>
                                    <p>{{ $comment->comment }}</p>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <div class="ni-detail-comment-form" data-scroll-index="2">
                        <h5 class="ni-detail-comments__title">{{ __('frontend.leave_a_comment') }}</h5>
                        <form id="contact-form" action="{{ route('comment.store') }}" method="POST">
                            @csrf
                            <input name="blog_id" type="hidden" value="{{ Crypt::encrypt($blog->id) }}">
                            <input name="page" type="hidden" value="{{ Crypt::encrypt(98) }}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="comment-form-group">
                                        <input type="text" class="form-control" name="name" placeholder="{{ __('frontend.your_name') }}" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="comment-form-group">
                                        <input type="email" class="form-control" name="email" placeholder="{{ __('frontend.your_email') }}" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="comment-form-group">
                                        <textarea class="form-control text-area" name="comment" cols="30" rows="6" placeholder="{{ __('frontend.your_comment') }}" autocomplete="off"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="ni-detail-btn ni-detail-btn--primary">
                                        <span class="text">{{ __('frontend.send_comment') }}</span>
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
