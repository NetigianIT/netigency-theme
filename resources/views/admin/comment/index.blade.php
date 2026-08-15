@extends('layouts.admin.master')

@section('content')

    <!-- Include Alert Blade -->
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-12 box-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-20">
                        <h6 class="card-title mb-0">{{ __('content.comments') }}</h6>
                        <div>
                            <form class="d-block  ml-auto" action="{{ route('comment-section.mark_all_approval_update') }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-primary mb-3ine">
                                    <i class="fas fa-bookmark"></i> {{ __('content.mark_all_as_approval') }}
                                </button>
                            </form>
                            </div>
                    </div>

                    @if (count($comments) > 0)
                        <table id="basic-datatable" class="table table-striped dt-responsive nowrap w-100">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th>{{ __('content.name') }}</th>
                                <th>{{ __('content.email') }}</th>
                                <th>{{ __('content.comment') }}</th>
                                <th>{{ __('content.approval_status') }}</th>
                                <th class="all text-center">{{ __('content.action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @php $i = 1; @endphp
                            @foreach ($comments as $comment)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        <a href="{{ url('blog/'.$comment->blog->slug) }}" target="_blank" class="d-inline-block text-truncate ni-comment-cell" title="{{ $comment->name }}">{{ $comment->name }}</a>
                                    </td>
                                    <td>
                                        <span class="d-inline-block text-truncate ni-comment-cell" title="{{ $comment->email }}">{{ $comment->email }}</span>
                                    </td>
                                    <td>
                                        <span class="d-inline-block text-truncate ni-comment-cell" title="{{ $comment->comment }}">{{ $comment->comment }}</span>
                                    </td>
                                    <td>
                                        @if ($comment->approval == 0)
                                            <span>{{ __('content.pending_approval') }}</span>
                                        @else
                                            <span>{{ __('content.approval') }}</span>
                                        @endif
                                    </td>
                                    <td class="all text-nowrap text-center">
                                        <div class="d-inline-flex align-items-center">
                                            @if ($comment->approval == 0)
                                                <form class="d-inline" action="{{ route('comment-section.update', $comment->id) }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button type="submit" data-toggle="tooltip" class="btn btn-link p-0 mr-2 ni-action-icon ni-action-approve" data-original-title="{{ __('content.mark') }}">
                                                        <i class="fas fa-bookmark font-18"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            <a href="#" class="ni-action-icon ni-action-delete" data-toggle="modal" data-target="#deleteModal{{ $comment->id }}" title="{{ __('content.delete') }}">
                                                <i class="fa fa-trash font-18"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="messageModalCenterTitle" aria-hidden="true">
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
                                                <form class="d-inline-block" action="{{ route('comment-section.destroy', $comment->id) }}" method="POST">
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
                    @else
                        <span>{{ __('content.not_yet_created') }}</span>
                    @endif

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div><!-- end row-->
@endsection