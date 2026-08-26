@php
    $footerPageLinks = collect($footer_pages ?? [])->values();
    $footerPagesCol1 = $footerPageLinks->take(4);
    $footerPagesCol2 = $footerPageLinks->slice(4, 4)->values();
@endphp

@if ($footerPagesCol1->isNotEmpty())
    <div class="col-md-6 col-lg-3 footer-widget-resp">
        <div class="footer-widget footer-widget-pl">
            <h6 class="footer-title">{{ __('frontend.customer_relationship') }}</h6>
            <ul class="footer-links">
                @foreach ($footerPagesCol1 as $footer_page)
                    <li>
                        <a href="{{ route('any-page.show', ['page_slug' => $footer_page->page_slug]) }}">
                            <i class="fas fa-angle-right"></i>
                            <span>{{ $footer_page->page_title }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@if ($footerPagesCol2->isNotEmpty())
    <div class="col-md-6 col-lg-3 footer-widget-resp">
        <div class="footer-widget footer-widget-pl">
            <h6 class="footer-title">{{ __('frontend.useful_links') }}</h6>
            <ul class="footer-links">
                @foreach ($footerPagesCol2 as $footer_page)
                    <li>
                        <a href="{{ route('any-page.show', ['page_slug' => $footer_page->page_slug]) }}">
                            <i class="fas fa-angle-right"></i>
                            <span>{{ $footer_page->page_title }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
