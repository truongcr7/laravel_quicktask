@extends('layouts.admin')

@section('title', 'Add Category')
@section('main')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">New Category</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form id="form-add" action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="inputName">Name</label>
                                <input type="text" name="name" class="form-control" id="inputName" placeholder="Enter name" aria-invalid="false">
                                @error('name')
                                    <small class="help-block" style="color: red;">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="inputDes">Description</label>
                                <input type="text" name="des" class="form-control" id="inputDes" placeholder="Enter description" aria-invalid="false">
                                @error('des')
                                    <small class="help-block" style="color: red;">{{ $message }}</small>
                                @enderror
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
