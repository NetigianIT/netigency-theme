@extends('layouts.admin.master')

@section('page_actions')
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#counterModal">+ {{ __('content.add_counter') }}</button>
@endsection

@section('content')

    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    @if (count($counters) > 0)
                        <div class="mr-3">
                            <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                <i class="fa fa-trash text-danger font-18"></i>
                            </a>
                        </div>
                        @if ($demo_mode == "on")
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form onsubmit="return btnCheckListGet()" action="{{ route('counter.destroy_checked') }}" method="POST">
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

                        <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                            <thead>
                            <tr>
                                <th scope="col">
                                    <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)" title="{{ __('content.all') }}">
                                </th>
                                <th>{{ __('content.timer') }}</th>
                                <th>{{ __('content.title') }}</th>
                                <th>{{ __('content.order') }}</th>
                                <th class="all custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $asc = 0; @endphp
                            @foreach ($counters as $counter)
                                <tr>
                                    <td>
                                        <input name="check_list[]" type="checkbox" value="{{ $counter->id }}" onclick="showHideDeleteButton2(this)"> <span class="ni-row-num">{{ ++$asc }}</span>
                                    </td>
                                    <td>{{ $counter->timer }}</td>
                                    <td>{{ $counter->title }}</td>
                                    <td>{{ $counter->order }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('counter.edit', $counter->id) }}" class="mr-2">
                                                <i class="fa fa-edit text-info font-18"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModal{{ $counter->id }}">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @else
                        <span>{{ __('content.not_yet_created') }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @foreach ($counters as $counter)
        <div class="modal fade" id="deleteModal{{ $counter->id }}" tabindex="-1" role="dialog" aria-labelledby="counterModalCenterTitle{{ $counter->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="counterModalCenterTitle{{ $counter->id }}">{{ __('content.delete') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center">
                        {{ __('content.you_wont_be_able_to_revert_this') }}
                    </div>
                    <div class="modal-footer">
                        @if ($demo_mode == "on")
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form class="d-inline-block" action="{{ route('counter.destroy', $counter->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                        @endif
                            <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                            <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <div class="modal fade" id="counterModal" tabindex="-1" role="dialog" aria-labelledby="counterModalLabel" aria-modal="false">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0 font-16" id="counterModalLabel">{{ __('content.add_new') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    @if ($demo_mode == "on")
                        @include('admin.demo_mode.demo-mode')
                    @else
                        <form action="{{ route('counter.store') }}" method="POST">
                            @csrf
                    @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="timer">{{ __('content.timer') }} <span class="text-red">*</span></label>
                                    <input type="number" name="timer" class="form-control" id="timer" required>
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
            </div>
        </div>
    </div>

@endsection
