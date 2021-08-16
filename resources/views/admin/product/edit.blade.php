@extends('layouts.admin')

@section('title', 'Edit Product')
@section('main')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">New Product</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="form-add" action="{{ route('product.update', $p->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="image-input">Image input</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image-input" name="image">
                                        <label class="custom-file-label" for="image-input">{{ $p->image }}</label>
                                    </div>
                                </div>
                                @error('image')
                                    <small class="help-block" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" name="name" value="{{ $p->name }}" class="form-control" id="inputName" placeholder="Enter name" aria-invalid="false">
                                @error('name')
                                    <small class="help-block" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputDes">Description</label>
                                <input type="text" name="des" value="{{ $p->des }}" class="form-control" id="inputDes" placeholder="Enter description" aria-invalid="false">
                                @error('des')
                                    <small class="help-block" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputPrice">Price</label>
                                <input type="number" name="price" value="{{ $p->price }}" class="form-control" id="inputPrice" placeholder="Enter price" aria-invalid="false">
                                @error('price')
                                    <small class="help-block" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category_id">
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}" @php if($cat->id == $p->category_id) echo "selected"; @endphp>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>

@stop()

@section('js')

<script>
    $('#image-input').on('change', function(){
      var fileName = $(this).val();
      $(this).next('.custom-file-label').html(fileName);
    });
</script>

@stop()
