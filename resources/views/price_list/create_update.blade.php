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
                  <input type="text" class="form-control" name="name" id="name" value="{{ isset($price_list) ? $price_list->name : '' }}" placeholder="Enter name">
              </div>
              <div class="form-group">
                  <label for="description">Description</label>
                  <input type="text" class="form-control" name="description" id="description" value="{{ isset($price_list) ? $price_list->description : '' }}" placeholder="Enter description">
              </div>
              <div class="form-group">
                  <label for="percentage_margin">Percentage margin</label>
                  <input type="text" class="form-control" name="percentage_margin" id="percentage_margin" value="{{ isset($price_list) ? $price_list->percentage_margin : '' }}" placeholder="Enter percentage margin">
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