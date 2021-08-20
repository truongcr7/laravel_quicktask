@extends('layouts.admin')

@section('title', __('messages.edit-product'))
@section('main')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">{{ __('messages.edit-product') }}</h3>
                    </div>
                    <form id="form-add" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="image-input">{{ __('messages.image') }}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image-input" name="image">
                                        <label class="custom-file-label" for="image-input">{{ $product->image }}</label>
                                    </div>
                                </div>
                                @error('image')
                                    <small class="help-block text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">{{ __('messages.product-name') }}</label>
                                <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="inputName" placeholder="{{ __('messages.enter-name') }}" aria-invalid="false">
                                @error('name')
                                    <small class="help-block text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputDes">{{ __('messages.description') }}</label>
                                <input type="text" name="des" value="{{ $product->des }}" class="form-control" id="inputDes" placeholder="{{ __('messages.enter-description') }}" aria-invalid="false">
                                @error('des')
                                    <small class="help-block text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputPrice">{{ __('messages.price') }}</label>
                                <input type="number" name="price" value="{{ $product->price }}" class="form-control" id="inputPrice" placeholder="{{ __('messages.enter-price') }}" aria-invalid="false">
                                @error('price')
                                    <small class="help-block text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>{{ __('messages.category') }}</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @php if ($category->id == $product->category_id) echo "selected"; @endphp>{{ $category->name }}</option>
                                    @endforeach
                                </select>
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

@section('js')

<script src="{{ asset('assets/ad123/dist/js/admin.js') }}"></script>

@stop()
