@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <!-- Form row -->
    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                @if (isset($skill))
                    @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form action="{{ route('skill.update', $skill->id) }}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="section_title">{{ __('content.section_title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="section_title" class="form-control" id="section_title" value="{{ $skill->section_title }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" value="{{ $skill->title }}" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="desc">{{ __('content.description') }}</label>
                                    <textarea name="desc" class="form-control" id="desc" rows="3">{{ $skill->desc }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skill_image">{{ __('content.thumbnail_dark') }} ({{ __('content.size') }} 480 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="skill_image" class="form-control-file" id="skill_image">
                                    <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                </div>
                                <div class="avatar-area text-center mt-2">
                                    @if (!empty($skill->skill_image))
                                        <img src="{{ asset('uploads/img/skill/'.$skill->skill_image) }}" alt="dark mode skill" class="rounded w-50">
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skill_image_light">{{ __('content.thumbnail_light') }} ({{ __('content.size') }} 480 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="skill_image_light" class="form-control-file" id="skill_image_light">
                                    <small class="form-text text-muted">{{ __('content.image_light_help') }}</small>
                                </div>
                                <div class="avatar-area text-center mt-2">
                                    @if (!empty($skill->skill_image_light))
                                        <img src="{{ asset('uploads/img/skill/'.$skill->skill_image_light) }}" alt="light mode skill" class="rounded w-50">
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
                                @if ($demo_mode == "on")
                                <!-- Include Alert Blade -->
                                    @include('admin.demo_mode.demo-mode')
                                @else
                                    <form action="{{ route('skill.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="section_title">{{ __('content.section_title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="section_title" class="form-control" id="section_title" required>
                                </div>
                            </div>
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skill_image">{{ __('content.thumbnail_dark') }} ({{ __('content.size') }} 480 x 600) (.svg, .jpg, .jpeg, .png) <span class="text-red">*</span></label>
                                    <input type="file" name="skill_image" class="form-control-file" id="skill_image" required>
                                    <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="skill_image_light">{{ __('content.thumbnail_light') }} ({{ __('content.size') }} 480 x 600) (.svg, .jpg, .jpeg, .png)</label>
                                    <input type="file" name="skill_image_light" class="form-control-file" id="skill_image_light">
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

    <div class="row ni-info-list-gap">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body pb-0">
                    <x-admin.global-table
                        :title="__('content.information_list')"
                        table-id="skill-info-datatable"
                        :has-records="count($info_lists) > 0"
                    >
                        <x-slot:add>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-animation="bounce" data-target=".bs-example-modal-lg">+ {{ __('content.add_info') }}</button>
                        </x-slot:add>

                        <div>
                            <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                <i class="fa fa-trash text-danger font-18"></i>
                            </a>
                        </div>
                        @if ($demo_mode == "on")
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form onsubmit="return btnCheckListGet()" action="{{ route('skill.destroy_checked') }}" method="POST">
                                @method('DELETE')
                                @csrf
                        @endif

                        <input type="hidden" id="checked_lists" name="checked_lists" value="">

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

                        <table id="skill-info-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th scope="col">
                                    <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)" title="{{ __('content.all') }}">
                                </th>
                                <th>{{ __('content.title') }}</th>
                                <th>{{ __('content.percent_rate') }}</th>
                                <th>{{ __('content.order') }}</th>
                                <th class="all custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $desc = count($info_lists); $asc=0; @endphp
                            @foreach ($info_lists as $info_list)
                                <tr>
                                    <td>
                                        <input name="check_list[]" type="checkbox" value="{{ $info_list->id }}" onclick="showHideDeleteButton2(this)"> <span class="ni-row-num">{{ ++$asc }}</span>
                                    </td>
                                    <td>{{ $info_list->title }}</td>
                                    <td>{{ $info_list->percent_rate }}</td>
                                    <td>{{ $info_list->order }}</td>
                                    <td>
                                        <div>
                                            <a href="#" class="mr-2" data-toggle="modal" data-target="#editInfoModal{{ $info_list->id }}">
                                                <i class="fa fa-edit text-info font-18"></i>
                                            </a>
                                            @if ($demo_mode == "on")
                                                @include('admin.demo_mode.demo-mode')
                                            @else
                                                <form class="d-inline-block" action="{{ route('skill.destroy_info_list', $info_list->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                            @endif

                                                    <span data-toggle="modal" data-target="#deleteModel{{ $info_list->id }}">
                                                        <a type="button">
                                                            <i class="fa fa-trash text-danger font-18"></i>
                                                        </a>
                                                    </span>
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

                                        <div class="modal fade" id="editInfoModal{{ $info_list->id }}" tabindex="-1" role="dialog" aria-labelledby="editInfoModalLabel{{ $info_list->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-md">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0 font-16" id="editInfoModalLabel{{ $info_list->id }}">{{ __('content.edit_info') }}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    </div>
                                                    <div class="modal-body">
                                                        @if ($demo_mode == "on")
                                                            @include('admin.demo_mode.demo-mode')
                                                        @else
                                                            <form action="{{ route('skill.update_info_list', $info_list->id) }}" method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="edit_title_{{ $info_list->id }}">{{ __('content.title') }} <span class="text-red">*</span></label>
                                                                            <input type="text" name="title" class="form-control" id="edit_title_{{ $info_list->id }}" value="{{ $info_list->title }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="edit_percent_rate_{{ $info_list->id }}">{{ __('content.percent_rate') }} <span class="text-red">*</span></label>
                                                                            <input type="number" name="percent_rate" class="form-control" id="edit_percent_rate_{{ $info_list->id }}" value="{{ $info_list->percent_rate }}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="edit_order_{{ $info_list->id }}">{{ __('content.order') }}</label>
                                                                            <input type="number" name="order" class="form-control" id="edit_order_{{ $info_list->id }}" value="{{ $info_list->order }}" required>
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
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </x-admin.global-table>
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
                @if ($demo_mode == "on")
                    <!-- Include Alert Blade -->
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('skill.store_info_list') }}" method="POST">
                            @csrf
                            @endif

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                    <input type="text" name="title" class="form-control" id="title" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="percent_rate">{{ __('content.percent_rate') }} <span class="text-red">*</span></label>
                                    <input type="number" name="percent_rate" class="form-control" id="percent_rate"  value="0" required>
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