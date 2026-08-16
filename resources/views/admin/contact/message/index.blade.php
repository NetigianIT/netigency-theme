@extends('layouts.admin.master')

@section('page_actions')
    <form class="d-block ml-auto" action="{{ route('message.mark_all_read_update') }}" method="POST">
        @csrf
        @method('PATCH')
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-bookmark"></i> {{ __('content.mark_all_as_read') }}
        </button>
    </form>
@endsection

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    @if (count($messages) > 0)
                        <div>
                            <input id="check_all" type="checkbox" onclick="showHideDeleteButton(this)">
                            <label for="check_all">{{ __('content.all') }}</label>
                            <a id="deleteChecked" class="ml-2" href="#" data-toggle="modal" data-target="#deleteCheckedModal">
                                <i class="fa fa-trash text-danger font-18"></i>
                            </a>
                        </div>
                        <form onsubmit="return btnCheckListGet()" action="{{ route('message.destroy_checked') }}" method="POST">
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
                        <div class="table-responsive ni-messages-table">
                        <table id="basic-datatable" class="table table-striped dt-responsive w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('content.name') }}</th>
                                <th>{{ __('content.email') }}</th>
                                <th>{{ __('content.subject') }}</th>
                                <th>{{ __('content.message') }}</th>
                                <th>{{ __('content.read_status') }}</th>
                                <th class="all custom-width-action">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $desc = count($messages); $asc = 0; @endphp
                            @foreach ($messages as $message)
                                <tr>
                                    <td>
                                        <input name="check_list[]" type="checkbox" value="{{ $message->id }}" onclick="showHideDeleteButton2(this)">
                                        <span class="d-none">{{ $asc++ }}{{ $desc-- }}</span>
                                    </td>
                                    <td title="{{ $message->name }}">{{ \Illuminate\Support\Str::limit($message->name, 36) }}</td>
                                    <td title="{{ $message->email }}">{{ \Illuminate\Support\Str::limit($message->email, 40) }}</td>
                                    <td title="{{ $message->subject }}">{{ \Illuminate\Support\Str::limit($message->subject, 48) }}</td>
                                    <td title="{{ $message->message }}">{{ \Illuminate\Support\Str::limit($message->message, 60) }}</td>
                                    <td>
                                        @if($message->read === 0)
                                            <span>{{ __('content.unread') }}</span>
                                        @else
                                            <span>{{ __('content.read') }}</span>
                                        @endif
                                    </td>
                                    <td class="all text-nowrap text-center">
                                        <div class="d-inline-flex align-items-center">
                                            @if ($message->read == 0)
                                                <form class="d-inline" action="{{ route('message.update', $message->id) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit" data-toggle="tooltip" class="btn btn-primary mr-2 pt-2 pb-2 pr-3 pl-3" data-original-title="{{ __('content.mark') }}">
                                                        <i class="fas fa-bookmark"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="#" data-toggle="modal" data-target="#deleteModal{{ $message->id }}">
                                                <i class="fa fa-trash text-danger font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $message->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="messageModalCenterTitle">{{ __('content.delete') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('content.close') }}">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-center">
                                                {{ __('content.you_wont_be_able_to_revert_this') }}
                                            </div>
                                            <div class="modal-footer">
                                                <form class="d-inline-block" action="{{ route('message.destroy', $message->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
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
                        </div>
                    @else
                        <span>{{ __('content.not_yet_created') }}</span>
                    @endif

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->
@endsection
