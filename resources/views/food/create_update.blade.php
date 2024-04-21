@extends('layout')
 
@section('wrapper-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: auto !important;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create/update food</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary">
            <!-- form start -->
              @if(isset($food))
                <form action="{{ route('food.update', $food) }}" method="POST">
                  @method('PUT')
              @else
                <form action="{{ route('food.store') }}" method="POST">
              @endif
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($food) ? $food->name : '') }}" placeholder="Enter name">
                  @error('name')
                    <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" value="{{ old('description', isset($food) ? $food->description : '') }}" placeholder="Enter description">
                    @error('description')
                      <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                @include('ingredient.table', ['ingredients' => $ingredients, 'food' => $food, 'checkbox_view' => true])
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
