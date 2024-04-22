@extends('layout')
 
@section('wrapper-content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="height: auto !important;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Price list</h1>
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
        <div class="row">
          <div class="col-12">
            <div class="card">

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" >
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($price_lists as $price_list)
                      <tr>
                        <td>{{ $price_list->id }}</td>
                        <td>{{ $price_list->name }}</td>
                        <td class="text-right"><a href="{{ route('price_list.export', $price_list->id) }}" type="button" class="btn btn-primary">Export</a></td>
                      </tr>                      
                    @endforeach
                  </tbody>
                </table>
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