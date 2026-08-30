@extends('layouts.admin.master')

@section('page_actions')
    <a href="{{ route('skill.create') }}" class="btn btn-primary">{{ __('content.skill') }}</a>
@endsection

@section('content')

    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body pb-0">
                    <x-admin.global-table
                        :title="__('content.information_list')"
                        table-id="basic-datatable"
                        :has-records="count($info_lists) > 0"
                    >
                        <x-slot:add>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSkillInfoModal">+ {{ __('content.add_info') }}</button>
                        </x-slot:add>

                        @if (count($info_lists) > 0)
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
                            @endif

                            <table id="basic-datatable" class="table table-striped dt-responsive w-100">
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
                                @php $asc = 0; @endphp
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
                                                <a href="{{ route('skill.edit_info_list', $info_list->id) }}" class="mr-2">
                                                    <i class="fa fa-edit text-info font-18"></i>
                                                </a>
                                                @if ($demo_mode != "on")
                                                    <form class="d-inline-block" action="{{ route('skill.destroy_info_list', $info_list->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <span data-toggle="modal" data-target="#deleteModel{{ $info_list->id }}">
                                                            <a type="button" href="javascript:void(0)">
                                                                <i class="fa fa-trash text-danger font-18"></i>
                                                            </a>
                                                        </span>
                                                        <div class="modal fade" id="deleteModel{{ $info_list->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">{{ __('content.delete') }}</h5>
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
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @endif
                    </x-admin.global-table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addSkillInfoModal" tabindex="-1" role="dialog" aria-labelledby="addSkillInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="addSkillInfoModalLabel">{{ __('content.add_new') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    @if ($demo_mode == "on")
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('skill.store_info_list') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="add_info_title">{{ __('content.title') }} <span class="text-red">*</span></label>
                                        <input type="text" name="title" class="form-control" id="add_info_title" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="add_percent_rate">{{ __('content.percent_rate') }} <span class="text-red">*</span></label>
                                        <input type="number" name="percent_rate" class="form-control" id="add_percent_rate" value="0" required>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" name="order" value="0">
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

@endsection
