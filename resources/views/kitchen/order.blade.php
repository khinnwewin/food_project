@extends('layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Order Panel</h1>
          </div><!-- /.col -->
         <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
          <div class="card-header">
            <h3 class="card-title">Order Listings</h3>
        </div>
          <!-- /.card-header -->
          <div class="card-body">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <table id="dishes" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Dish Name</th>
                <th>Table Number</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach($orders as $order)
              <tr>
                <th>{{$order->dish->name}}</th>
                <th>{{$order->table_id}}</th>
                <th>{{$status[$order->status]}}</th>
                <th>
                  <a href="order/{{$order->id}}/approve" class="btn btn-warning">Approve</a>
                  <a href="order/{{$order->id}}/cancel" class="btn btn-danger">Cancel</a>
                  <a href="order/{{$order->id}}/ready" class="btn btn-success">Ready</a>
                </th>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>
          </div>
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   
@endsection
<script src="plugins/jquery/jquery.min.js"></script>

    <script>
    $(function () {
      $('#dishes').DataTable({
        "paging": true,
        "page_length":15,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
