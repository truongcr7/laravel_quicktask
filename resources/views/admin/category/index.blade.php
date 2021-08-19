@extends('layouts.admin')

@section('title', __('messages.list-category'))
@section('main')

<form class="form-inline">
    <div class="form-group">
        <input type="text" name="key" id="" class="form-control" placeholder="{{ __('messages.enter-name') }}">
    </div>
    <button type="submit" class="btn btn-primary" id="btn-search">
        <i class="fas fa-search"></i>
    </button>
</form>
<a href="{{ route('categories.create') }}" class="btn btn-outline-primary">{{ __('messages.add-new-category') }}</a>
<hr>
<table class="table table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">{{ __('messages.number') }}</th>
            <th class="text-center">{{ __('messages.category-name') }}</th>
            <th class="text-center">{{ __('messages.description') }}</th>
            <th class="text-center">{{ __('messages.list-product') }}</th>
            <th class="text-center">{{ __('messages.created-date') }}</th>
            <th class="text-center">{{ __('messages.updated-date') }}</th>
            <th class="text-center">{{ __('messages.handle') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td scope="row">{{ $loop->index + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->des }}</td>
                <th class="text-center"><a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm">{{ __('messages.view') }}</a></th>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td class="text-center">
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('categories.destroy', $category->id) }}" class="btn btn-sm btn-danger btn-delete">
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
    {{ $categories->links() }}
</div>
@stop();

@section('js')

<script src="{{ asset('assets/ad123') }}/dist/js/admin.js"></script>

@stop()
