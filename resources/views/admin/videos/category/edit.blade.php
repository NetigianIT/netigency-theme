@extends('layouts.admin.master')

@section('page_tabs')
    @include('admin.videos.partials.tabs')
@endsection

@section('content')
    @include('admin.alert.alert')

    <div class="row">
        <div class="col-xl-8 box-margin">
            <div class="card card-body">
                <form action="{{ route('video-category.update', $category->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label>{{ __('content.category_name') }} <span class="text-red">*</span></label>
                        <input type="text" name="category_name" class="form-control" value="{{ $category->category_name }}" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('content.order') }} <span class="text-red">*</span></label>
                        <input type="number" name="order" class="form-control" value="{{ $category->order }}" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('content.status') }}</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>{{ __('content.enable') }}</option>
                            <option value="0" {{ $category->status == 0 ? 'selected' : '' }}>{{ __('content.disable') }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ __('content.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
