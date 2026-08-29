@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                @if (isset($about))
                    <form action="{{ route('about.update', $about->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $about->title }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }}</label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3">{{ $about->desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="video_link">{{ __('content.video_link') }}</label>
                                    <input type="text" name="video_link" class="form-control" id="video_link" value="{{ $about->video_link }}">
                                    <small id="video_link" class="form-text text-muted">{{ __('content.youtube_supported') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="about_image">{{ __('content.thumbnail_dark') }} ({{ __('content.size') }} 480 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="about_image" class="form-control-file" id="about_image">
                                    <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                </div>
                                <div class="avatar-area text-center mt-2">
                                    @if (!empty($about->about_image))
                                        <img src="{{ asset('uploads/img/about/'.$about->about_image) }}" alt="dark mode about" class="rounded w-50">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="about_image_light">{{ __('content.thumbnail_light') }} ({{ __('content.size') }} 480 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="about_image_light" class="form-control-file" id="about_image_light">
                                    <small class="form-text text-muted">{{ __('content.image_light_help') }}</small>
                                </div>
                                <div class="avatar-area text-center mt-2">
                                    @if (!empty($about->about_image_light))
                                        <img src="{{ asset('uploads/img/about/'.$about->about_image_light) }}" alt="light mode about" class="rounded w-50">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }}</label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="video_link">{{ __('content.video_link') }}</label>
                                    <input type="text" name="video_link" class="form-control" id="video_link">
                                    <small id="video_link" class="form-text text-muted">{{ __('content.youtube_supported') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="about_image">{{ __('content.thumbnail_dark') }} ({{ __('content.size') }} 480 x 600) (.svg, .jpg, .jpeg, .png) <span class="text-red">*</span></label>
                                    <input type="file" name="about_image" class="form-control-file" id="about_image" required>
                                    <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="about_image_light">{{ __('content.thumbnail_light') }} ({{ __('content.size') }} 480 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="about_image_light" class="form-control-file" id="about_image_light">
                                    <small class="form-text text-muted">{{ __('content.image_light_help') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary mr-2">{{ __('content.submit') }}</button>
                            </div>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-12">
            <div class="card mb-30">
                <div class="card-body pb-0">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.information_list') }}</h6>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">+ {{ __('content.add_info') }}</button>
                    </div>
                    <div class="table-responsive order-stats ni-dt-toolbar-end">
                        @if (count($info_lists) > 0)
                            <div>
                                <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                    <i class="fa fa-trash text-danger font-18"></i>
                                </a>
                            </div>
                            <form onsubmit="return btnCheckListGet()" action="{{ route('about.destroy_checked') }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" id="checked_lists" name="checked_lists" value="">

                                <!-- Modal -->
                                <div class="modal fade" id="deleteCheckedModal" tabindex="-1" role="dialog" aria-labelledby="deleteCheckedModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteCheckedModalCenterTitle">{{ __('content.delete') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                {{ __('content.delete_selected') }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                <button onclick="btnCheckListGet()" type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <table id="basic-datatable"  class="table table-striped dt-responsive w-100">
                                <thead>
                                <tr>
                                    <th scope="col">
                                    <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)" title="{{ __('content.all') }}">
                                </th>
                                    <th>{{ __('content.description') }}</th>
                                    <th>{{ __('content.order') }}</th>
                                    <th class="all custom-width-action">{{ __('content.action') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $desc = count($info_lists); $asc=0; @endphp
                                @foreach ($info_lists as $info_list)
                                    <tr>
                                        <td>
                                            <input  name="check_list[]" type="checkbox" value="{{ $info_list->id }}" onclick="showHideDeleteButton2(this)"> <span class="ni-row-num">{{ ++$asc }}</span>
                                        </td>
                                        <td>{{ $info_list->desc }}</td>
                                        <td>{{ $info_list->order }}</td>
                                        <td>
                                            <div>
                                                <a href="{{ route('about.edit_info_list', $info_list->id) }}" class="mr-2">
                                                    <i class="fa fa-edit text-info font-18"></i>
                                                </a>
                                                <form class="d-inline-block" action="{{ route('about.destroy_info_list', $info_list->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <span data-toggle="modal" data-target="#deleteModel{{ $info_list->id }}">
                                                            <a type="button">
                                                            <i class="fa fa-trash text-danger font-18"></i>
                                                        </a>
                                                       </span>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="deleteModel{{ $info_list->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalCenterTitle">{{ __('content.delete') }}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body text-center">
                                                                    {{ __('content.you_wont_be_able_to_revert_this') }}
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                                    <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
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
    </div><!-- end row -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="myLargeModalLabel">{{ __('content.add_new') }}</h5><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('about.store_info_list') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }} <span class="text-red">*</span></label>
                                    <input type="text" name="desc" class="form-control" id="desc" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="order">{{ __('content.order') }}</label>
                                    <input type="number" name="order" class="form-control" id="order" value="0" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary">{{ __('content.submit') }}</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


@endsection