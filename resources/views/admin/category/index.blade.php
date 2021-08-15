@extends('layouts.admin')

@section('title', 'List Category')
@section('main')

<form class="form-inline">
    <div class="form-group">
        <input type="text" name="key" id="" class="form-control" placeholder="Search By Name...">
    </div>
    <button type="submit" class="btn btn-primary" style="height: 37px;">
        <i class="fas fa-search"></i>
    </button>
</form>
<a href="{{ route('category.create') }}" class="btn btn-outline-primary">Add new category</a>
<hr>
<table class="table table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Name</th>
            <th class="text-center">Description</th>
            <th class="text-center">List Product</th>
            <th class="text-center">Created Date</th>
            <th class="text-center">Updated Date</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td scope="row">{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->des }}</td>
                <th class="text-center"><a href="{{ route('category.show', $category->id) }}" class="btn btn-info btn-sm">View</a></th>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td class="text-center">
                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('category.destroy', $category->id) }}" class="btn btn-sm btn-danger btn-delete">
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

<script>
    $('.btn-delete').click(function(ev){
        ev.preventDefault();
        var _href = $(this).attr('href');
        
        $('form#form-delete').attr('action', _href);
        if(confirm('Are you sure to want to delete?')){
            $('form#form-delete').submit();
        }
    });
</script>

@stop()
