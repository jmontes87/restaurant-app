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
                @include('ingredient.table', ['ingredients' => $ingredients, 'food' => isset($food) ? $food : null, 'checkbox_view' => true])
                <div class="form-group">
                    <label for="price_cost">Price cost</label>
                    <input type="text" class="form-control" id="price_cost" name="price_cost" value="{{ old('price_cost', isset($food) ? $food->price_cost : '') }}" placeholder="Price cost" readonly>
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
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
      const checkboxes = document.querySelectorAll('input[name="ingredients[]"]');

      checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
          // Calculamos el precio total
          let totalPrice = 0;
          checkboxes.forEach(function(checkbox) {
            if (checkbox.checked) {
              totalPrice += parseFloat(checkbox.dataset.price);
            }
          });
          // Mostramos el precio total en el campo de entrada price_cost
          document.getElementById('price_cost').value = totalPrice.toFixed(2);
        });
      });
    });
  </script>
@endsection
