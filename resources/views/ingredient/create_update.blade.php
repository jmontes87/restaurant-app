@extends('layout')
 
@section('wrapper-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: auto !important;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create/update ingredient</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          @if(isset($ingredient))
            <form action="{{ route('ingredient.update', $ingredient) }}" method="POST">
              @method('PUT')
          @else
            <form action="{{ route('ingredient.store') }}" method="POST">
          @endif
          @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($ingredient) ? $ingredient->name : '') }}" placeholder="Enter name">
                    @error('name')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description', isset($ingredient) ? $ingredient->description : '') }}" placeholder="Enter description">
                    @error('description')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="price_cost">Price cost</label>
                    <input type="text" class="form-control" id="price_cost" name="price_cost" value="{{ old('price_cost', isset($ingredient) ? $ingredient->price_cost : '') }}" placeholder="Enter price cost">
                    @error('price_cost')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
