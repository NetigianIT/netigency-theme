@extends('layouts.admin.master')

@section('page_actions')
    <a href="{{ route('team.index') }}" class="btn btn-primary"><i class="fas fa-angle-left"></i> {{ __('content.back') }}</a>
@endsection

@section('content')

    @include('admin.alert.alert')

    <div class="row">
        <div class="col-xl-12 box-margin height-card">
            <div class="card card-body">
                <h4 class="card-title">{{ __('content.edit_team') }}</h4>
            @if ($demo_mode == "on")
                    @include('admin.demo_mode.demo-mode')
                @else
                    <form action="{{ route('team.update', $team->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        @endif

                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">{{ __('content.name') }} <span class="text-red">*</span></label>
                                            <input type="text" name="name" class="form-control" value="{{ old('name', $team->name) }}" id="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="job">{{ __('content.job') }}</label>
                                            <input type="text" name="job" class="form-control" value="{{ old('job', $team->job) }}" id="job">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link_2">Facebook</label>
                                            <input type="text" name="link_2" class="form-control" value="{{ old('link_2', $team->link_2) }}" id="link_2">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link_3">Twitter</label>
                                            <input type="text" name="link_3" class="form-control" value="{{ old('link_3', $team->link_3) }}" id="link_3">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link_4">Instagram</label>
                                            <input type="text" name="link_4" class="form-control" value="{{ old('link_4', $team->link_4) }}" id="link_4">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link_5">Linkedin</label>
                                            <input type="text" name="link_5" class="form-control" value="{{ old('link_5', $team->link_5) }}" id="link_5">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="order">{{ __('content.order') }}</label>
                                            <input type="number" name="order" class="form-control" id="order" value="{{ old('order', $team->order) }}" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="team_image">{{ __('content.image') }} ({{ __('content.size') }} 200 x 200) (.svg, .jpg, .jpeg, .png)</label>
                                            <input type="file" name="team_image" class="form-control-file" id="team_image">
                                            <small class="form-text text-muted">{{ __('content.please_use_recommended_sizes') }}</small>
                                        </div>
                                        <div class="height-card box-margin">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="avatar-area text-center">
                                                        <div class="media">
                                                            @if (!empty($team->team_image))
                                                                <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.current_image') }}">
                                                                    <img src="{{ asset('uploads/img/teams/'.$team->team_image) }}" alt="team image" class="rounded w-25">
                                                                </a>
                                                            @else
                                                                <a class="d-block mx-auto" href="#" data-toggle="tooltip" data-placement="top" data-original-title="{{ __('content.not_yet_created') }}">
                                                                    <img src="{{ asset('uploads/img/dummy/no-image.jpg') }}" alt="no image" class="rounded w-25">
                                                                </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <small class="form-text text-muted">{{ __('content.required_fields') }}</small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary col-12">{{ __('content.submit') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
    </div>

@endsection
