@extends('layouts.admin.master')

@section('page_tabs')
    @include('admin.portfolio.partials.tabs')
@endsection

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    @if (count($portfolios) > 0)
                        <div>
                            <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                <i class="fa fa-trash text-danger font-18"></i>
                            </a>
                        </div>
                        @if ($demo_mode == "on")
                        <!-- Include Alert Blade -->
                            @include('admin.demo_mode.demo-mode')
                        @else
                            <form onsubmit="return btnCheckListGet()" action="{{ route('portfolio.destroy_checked') }}" method="POST">
                                @method('DELETE')
                                @csrf
                                @endif

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
                        <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                            <thead>
                            <tr>
                                <th scope="col">
                                    <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)" title="{{ __('content.all') }}">
                                </th>
                                <th>{{ __('content.title') }}</th>
                                <th>{{ __('content.category_name') }}</th>
                                <th>{{ __('content.order') }}</th>
                                <th class="all custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $desc = count($portfolios); $asc=0; @endphp
                            @foreach ($portfolios as $portfolio)
                                <tr>
                                    <td>
                                        <input  name="check_list[]" type="checkbox" value="{{ $portfolio->id }}" onclick="showHideDeleteButton2(this)"> <span class="ni-row-num">{{ ++$asc }}</span>
                                    </td>
                                    <td>{{ $portfolio->title }}</td>
                                    <td>{{ $portfolio->category_name }}</td>
                                    <td>{{ $portfolio->order }}</td>
                                    <td>
                                        <div>
                                            <a href="{{ route('portfolio-slider.create', $portfolio->id) }}" class="ni-action-icon ni-action-view mr-2" title="{{ __('content.sliders') }}">
                                                <i class="fas fa-images font-18" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('portfolio-detail.create', $portfolio->id) }}" class="ni-action-icon ni-action-view mr-2" title="{{ __('content.details') }}">
                                                <i class="far fa-eye font-18" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('portfolio.edit', $portfolio->id) }}" class="ni-action-icon mr-2" title="{{ __('content.edit') }}">
                                                <i class="fa fa-edit text-info font-18" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" class="ni-action-icon ni-action-delete" data-toggle="modal" data-target="#deleteModal{{ $portfolio->id }}" title="{{ __('content.delete') }}">
                                                <i class="fa fa-trash text-danger font-18" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $portfolio->id }}" tabindex="-1" role="dialog" aria-labelledby="counterModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="counterModalCenterTitle">{{ __('content.delete') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                {{ __('content.you_wont_be_able_to_revert_this') }}
                                            </div>
                                            <div class="modal-footer">
                                            @if ($demo_mode == "on")
                                                <!-- Include Alert Blade -->
                                                    @include('admin.demo_mode.demo-mode')
                                                @else
                                                    <form class="d-inline-block" action="{{ route('portfolio.destroy', $portfolio->id) }}" method="POST">
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