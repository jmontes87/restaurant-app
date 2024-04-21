@extends('layout')
 
@section('wrapper-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: auto !important;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Ingredients</h1>
          </div><!-- /.col -->
          <div class="pull-right col-sm-6 text-right">
              <a href="{{ route('ingredient.create') }}" type="button" class="btn btn-primary">Create</a>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" >
                @include('ingredient.table' , ['ingredients', $ingredients, 'checkbox_view' => false])
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection