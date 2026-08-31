@extends('layouts.admin.master')

@section('page_tabs')
    @include('admin.videos.partials.tabs')
@endsection

@section('page_actions')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#categoryModal">+ {{ __('content.add_category') }}</button>
@endsection

@section('content')
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    @if (count($categories) > 0)
                        <div>
                            <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                <i class="fa fa-trash text-danger font-18"></i>
                            </a>
                        </div>
                        <form onsubmit="return btnCheckListGet()" action="{{ route('video-category.destroy_checked') }}" method="POST">
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
                                <th>{{ __('content.category_name') }}</th>
                                <th>{{ __('content.order') }}</th>
                                <th>{{ __('content.status') }}</th>
                                <th class="all custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>
                                        <input name="check_list[]" type="checkbox" value="{{ $category->id }}" onclick="showHideDeleteButton2(this)">
                                        <span class="ni-row-num">{{ $loop->iteration }}</span>
                                    </td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->order }}</td>
                                    <td>
                                        @if ($category->status == 0)
                                            <span class="badge badge-danger">{{ __('content.disable') }}</span>
                                        @else
                                            <span class="badge badge-success">{{ __('content.enable') }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('video-category.edit', $category->id) }}" class="mr-2"><i class="fa fa-edit text-info font-18"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#deleteModel{{ $category->id }}"><i class="fa fa-trash text-danger font-18"></i></a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="deleteModel{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('video-category.destroy', $category->id) }}" method="POST">
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

    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{ route('video-category.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('content.add_category') }}</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>{{ __('content.category_name') }} <span class="text-red">*</span></label>
                            <input type="text" name="category_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>{{ __('content.order') }} <span class="text-red">*</span></label>
                            <input type="number" name="order" class="form-control" value="0" required>
                        </div>
                        <div class="form-group">
                            @include('admin.components.switch', [
                                'name' => 'status',
                                'id' => 'status',
                                'label' => __('content.status'),
                                'value' => (string) old('status', '1'),
                                'onLabel' => __('content.enable'),
                                'offLabel' => __('content.disable'),
                            ])
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">{{ __('content.submit') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
