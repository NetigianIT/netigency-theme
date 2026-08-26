@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    @if (count($pages) > 0)
                        <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                            <thead>
                            <tr>
                                <th>{{ __('content.title') }}</th>
                                <th>{{ __('content.order') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th>{{ __('content.display_header_menu') }}</th>
                                <th class="all custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $asc = 0; @endphp
                            @foreach ($pages as $page)
                                <tr>
                                    <td><span class="ni-row-num">{{ ++$asc }}.</span> {{ $page->page_title }}</td>
                                    <td>{{ $page->order }}</td>
                                    <td>
                                        @if ($page->status == 0)
                                            <span class="badge badge-pill badge-danger">{{ __('content.disable') }}</span>
                                        @else
                                            <span class="badge badge-pill badge-success">{{ __('content.enable') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($page->display_header_menu == 0)
                                            <span class="badge badge-pill badge-danger">{{ __('content.no') }}</span>
                                        @elseif ($page->display_header_menu == 1)
                                            <span class="badge badge-pill badge-success">{{ __('content.yes') }}</span>
                                        @else
                                            <span class="badge badge-pill badge-success">{{ __('content.other') }}</span>
                                            <input type="text" value="{{ url('/'.$page->page_slug) }}" id="copyLink{{ $page->id }}">
                                            <button class="btn btn-success" onclick="copyLink({{ $page->id }})">{{ __('Copy Link') }}</button>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('page.edit', $page->id) }}" class="mr-2">
                                            <i class="fa fa-edit text-info font-18"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <span>{{ __('content.not_yet_created') }}</span>
                    @endif

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->
@endsection
