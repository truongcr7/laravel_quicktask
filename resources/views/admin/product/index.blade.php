@extends('layouts.admin')

@section('title', __('messages.list-product'))
@section('main')

<form class="form-inline">
    <div class="form-group">
        <input type="text" name="key" id="" class="form-control" placeholder="{{ __('messages.enter-name') }}">
    </div>
    <button type="submit" class="btn btn-primary" id="btn-search">
        <i class="fas fa-search"></i>
    </button>
</form>
<a href="{{ route('products.create') }}" class="btn btn-outline-primary" id="">{{ __('messages.add-new-product') }}</a>
<hr>
<table class="table table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">{{ __('messages.number') }}</th>
            <th class="text-center">{{ __('messages.image') }}</th>
            <th class="text-center">{{ __('messages.product-name') }}</th>
            <th class="text-center">{{ __('messages.description') }}</th>
            <th class="text-center">{{ __('messages.price') }}</th>
            <th class="text-center">{{ __('messages.category') }}</th>
            <th class="text-center">{{ __('messages.created-date') }}</th>
            <th class="text-center">{{ __('messages.updated-date') }}</th>
            <th class="text-center">{{ __('messages.handle') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
            <tr>         
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td><img src="{{ asset('uploads/' . $product->image) }}" id="img-upload" alt=""></td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->des }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->created_at }}</td>
                <td>{{ $product->updated_at }}</td>
                <td class="text-center">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('products.destroy', $product->id) }}" class="btn btn-sm btn-danger btn-delete">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<form method="POST" id="form-delete">
    @csrf
    @method('DELETE')
</form>
<hr>
<div>
    {{ $products->links() }}
</div>
@stop();

@section('js')

<script src="{{ asset('assets/ad123/dist/js/admin.js') }}"></script>

@stop()
