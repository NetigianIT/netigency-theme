@extends('layouts.admin.master')

@section('page_tabs')
    @include('admin.videos.partials.tabs')
@endsection

@section('page_actions')
    <a href="{{ route('video-item.create') }}" class="btn btn-primary">+ {{ __('content.add_video') }}</a>
@endsection

@section('content')
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    @if (count($videos) > 0)
                        <div>
                            <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                <i class="fa fa-trash text-danger font-18"></i>
                            </a>
                        </div>
                        <form onsubmit="return btnCheckListGet()" action="{{ route('video-item.destroy_checked') }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="hidden" id="checked_lists" name="checked_lists" value="">
                            <div class="modal fade" id="deleteCheckedModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{ __('content.delete') }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                        </div>
                                        <div class="modal-body text-center">{{ __('content.delete_selected') }}</div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                            <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th><input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)"></th>
                                <th>{{ __('content.title') }}</th>
                                <th>{{ __('content.category') }}</th>
                                <th>{{ __('content.type') }}</th>
                                <th>{{ __('content.order') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th class="all custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($videos as $video)
                                <tr>
                                    <td>
                                        <input name="check_list[]" type="checkbox" value="{{ $video->id }}" onclick="showHideDeleteButton2(this)">
                                        <span class="ni-row-num">{{ $loop->iteration }}</span>
                                    </td>
                                    <td>{{ $video->title }}</td>
                                    <td>{{ $video->category_name }}</td>
                                    <td>{{ ucfirst($video->provider) }}</td>
                                    <td>{{ $video->order }}</td>
                                    <td>
                                        @if ($video->status == 0)
                                            <span class="badge badge-danger">{{ __('content.disable') }}</span>
                                        @else
                                            <span class="badge badge-success">{{ __('content.enable') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('video-item.edit', $video->id) }}" class="mr-2"><i class="fa fa-edit text-info font-18"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#deleteModel{{ $video->id }}"><i class="fa fa-trash text-danger font-18"></i></a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="deleteModel{{ $video->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('video-item.destroy', $video->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <div class="modal-header">
                                                    <h5 class="modal-title">{{ __('content.delete') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                                                </div>
                                                <div class="modal-body text-center">{{ __('content.you_wont_be_able_to_revert_this') }}</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                    <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>{{ __('content.not_yet_created') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
