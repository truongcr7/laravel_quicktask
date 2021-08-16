@extends('layouts.admin')

@section('title', 'List Product')
@section('main')

<form class="form-inline">
    <div class="form-group">
        <input type="text" name="key" id="" class="form-control" placeholder="Search By Name...">
    </div>
    <button type="submit" class="btn btn-primary" style="height: 37px;">
        <i class="fas fa-search"></i>
    </button>
</form>
<a href="{{ route('product.create') }}" class="btn btn-outline-primary" id="">Add new product</a>
<hr>
<table class="table table-hover table-bordered">
    <thead class="thead-dark">
        <tr>
            <th class="text-center">Id</th>
            <th class="text-center">Image</th>
            <th class="text-center">Name</th>
            <th class="text-center">Description</th>
            <th class="text-center">Price</th>
            <th class="text-center">Category</th>
            <th class="text-center">Created Date</th>
            <th class="text-center">Updated Date</th>
            <th class="text-center">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $p)
            <tr>         
                <td scope="row">{{ $p->id }}</td>
                <td><img src="{{ url('uploads') }}/{{ $p->image }}" alt="" style="width: 80px; height: 80px;"></td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->des }}</td>
                <td>{{ $p->price }}</td>
                <td>{{ $p->category->name }}</td>
                <td>{{ $p->created_at }}</td>
                <td>{{ $p->updated_at }}</td>
                <td class="text-center">
                    <a href="{{ route('product.edit', $p->id) }}" class="btn btn-sm btn-success">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('product.destroy', $p->id) }}" class="btn btn-sm btn-danger btn-delete">
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
