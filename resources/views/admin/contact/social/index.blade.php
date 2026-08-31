@extends('layouts.admin.master')

@section('page_tabs')
    @include('admin.contact.partials.tabs')
@endsection

@section('page_actions')
    <a href="{{ url('admin/social/create') }}" class="btn btn-primary">+ {{ __('content.add_social') }}</a>
@endsection

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    @if (count($socials) > 0)
                        <div>
                            <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                <i class="fa fa-trash text-danger font-18"></i>
                            </a>
                        </div>
                        @if ($demo_mode == "on")
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form onsubmit="return btnCheckListGet()" action="{{ route('social.destroy_checked') }}" method="POST">
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
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th scope="col">
                                    <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)" title="{{ __('content.all') }}">
                                </th>
                                <th>{{ __('content.socials') }}</th>
                                <th>{{ __('content.link') }}</th>
                                <th class="all text-left">{{ __('content.status') }}</th>
                                <th class="all custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $desc = count($socials); $asc = 0; @endphp
                            @foreach ($socials as $social)
                                <tr>
                                    <td>
                                        <input name="check_list[]" type="checkbox" value="{{ $social->id }}" onclick="showHideDeleteButton2(this)">
                                        <span class="ni-row-num">{{ ++$asc }}</span>
                                    </td>
                                    <td><i class="{{ $social->social_media }}"></i></td>
                                    <td>{{ $social->link }}</td>
                                    <td class="text-left align-middle">
                                        @include('admin.components.switch', [
                                            'name' => 'status_'.$social->id,
                                            'id' => 'status_'.$social->id,
                                            'value' => (string) ($social->status ?? 0),
                                            'onLabel' => __('content.enable'),
                                            'offLabel' => __('content.disable'),
                                            'compact' => true,
                                            'hideState' => true,
                                            'toggleUrl' => route('social.update_status', $social->id),
                                        ])
                                    </td>
                                    <td class="all text-nowrap text-center">
                                        <div>
                                            <a href="{{ route('social.edit', $social->id) }}" class="mr-2">
                                                <i class="fa fa-edit text-info font-18"></i>
                                            </a>
                                            <a href="#" data-toggle="modal" data-target="#deleteModel{{ $social->id }}">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                    <div class="modal fade" id="deleteModel{{ $social->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                                @if ($demo_mode == "on")
                                                        @include('admin.demo_mode.demo-mode')
                                                    @else
                                                        <form class="d-inline-block" action="{{ route('social.destroy', $social->id) }}" method="POST">
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
