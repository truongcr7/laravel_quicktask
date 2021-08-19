@extends('layouts.admin')

@section('title', __('messages.edit-category'))
@section('main')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('messages.edit-category') }}</h3>
                    </div>
                    <form id="form-add" action="{{ route('categories.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">{{ __('messages.category-name') }}</label>
                                <input type="text" name="name" value="{{ $category->name }}" class="form-control" id="inputName" placeholder="{{ __('messages.enter-name') }}" aria-invalid="false">
                                @error('name')
                                    <small class="help-block text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputDes">Description</label>
                                <input type="text" name="des" value="{{ $category->des }}" class="form-control" id="inputDes" placeholder="{{ __('messages.enter-description') }}" aria-invalid="false">
                                @error('des')
                                    <small class="help-block text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">{{ __('messages.save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@stop()
