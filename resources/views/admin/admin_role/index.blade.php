@extends('layouts.admin.master')

@section('page_actions')
    <a href="{{ url('admin/admin-role/create') }}" class="btn btn-primary">+ {{ __('content.add_admin_role') }}</a>
@endsection

@section('content')

    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    @if (count($roles) > 0)
                        <div>
                            <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                <i class="fa fa-trash text-danger font-18"></i>
                            </a>
                        </div>

                        @if ($demo_mode == "on")
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form onsubmit="return btnCheckListGet()" action="{{ route('admin-role.destroy_checked') }}" method="POST">
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
                                                <button onclick="return btnCheckListGet()" type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
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
                                <th>{{ __('content.role_name') }}</th>
                                <th>{{ __('content.permissions') }}</th>
                                <th class="all custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $asc = 0; @endphp
                            @foreach ($roles as $role)
                                <tr>
                                    <td>
                                        @if ($role->name != 'super-admin')
                                            <input name="check_list[]" type="checkbox" value="{{ $role->id }}" onclick="showHideDeleteButton2(this)">
                                        @endif
                                        <span class="ni-row-num">{{ ++$asc }}</span>
                                    </td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @php $role_permissions = $role->getAllPermissions(); @endphp
                                        @if ($role->name == 'super-admin')
                                            <span class="badge badge-success m-1 permission-chip">{{ __('content.has_all_permissions') }}</span>
                                        @else
                                            @foreach ($role_permissions as $role_permission)
                                                <span class="badge badge-success m-1 permission-chip">{{ $role_permission->name }}</span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="all text-nowrap text-center">
                                        <div>
                                           @if ($role->name != 'super-admin')
                                                <a href="{{ route('admin-role.edit', $role->id) }}" class="mr-2" title="{{ __('content.edit') }}">
                                                    <i class="fa fa-edit text-info font-18"></i>
                                                </a>
                                                <a href="#" data-toggle="modal" data-target="#deleteModal{{ $role->id }}" title="{{ __('content.delete') }}">
                                                    <i class="fa fa-trash text-danger font-18"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        @foreach ($roles as $role)
                            @if ($role->name != 'super-admin')
                                <div class="modal fade" id="deleteModal{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalTitle{{ $role->id }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalTitle{{ $role->id }}">{{ __('content.delete') }}</h5>
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
                                                    <form class="d-inline-block" action="{{ route('admin-role.destroy', $role->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('content.cancel') }}</button>
                                                        <button type="submit" class="btn btn-success">{{ __('content.yes_delete_it') }}</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @else
                        <span>{{ __('content.not_yet_created') }}</span>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
