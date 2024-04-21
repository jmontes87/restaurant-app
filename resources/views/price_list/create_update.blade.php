@extends('layout')
 
@section('wrapper-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: auto !important;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Create/update price list</h1>
          </div><!-- /.col -->
          <div class="pull-right col-sm-6 text-right">
              <a href="{{ route('price_list.create') }}" type="button" class="btn btn-primary">Create</a>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @if(isset($price_list))
            <form action="{{ route('price_list.update', $price_list) }}" method="POST">
              @method('PUT')
          @else
            <form action="{{ route('price_list.store') }}" method="POST">
          @endif
          @csrf
          <div class="card-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', isset($price_list) ? $price_list->name : '') }}" placeholder="Enter name">
                @error('name')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="{{ old('description', isset($price_list) ? $price_list->description : '') }}" placeholder="Enter description">
                @error('description')
                  <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group">
                  <label for="percentage_margin">Percentage margin</label>
                  <input type="text" class="form-control" name="percentage_margin" id="percentage_margin" value="{{ old('percentage_margin', isset($price_list) ? $price_list->percentage_margin : '') }}" placeholder="Enter percentage margin">
                   @error('percentage_margin')
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