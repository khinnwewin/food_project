@extends('layouts.master')
@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Kitchen Panel</h1>
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
		        <h3 class="card-title">Dishes</h3>
		        <a href="dish/create" class="btn btn-default float-right">Create New Dish</a>
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
	                    <th>Category Name</th>
	                    <th>Created At</th>
	                    <th>Actions</th>
	                  </tr>
	                  </thead>
	                  <tbody>
	                  @foreach($dishes as $dish)
	                  <tr>
	                    <th>{{$dish->name}}</th>
	                    <th>{{$dish->category->name}}</th>
	                    <th>{{$dish->created_at}}</th>
	                    <th>
	                    	<div class="form-row">
	                    	<a style="height:40px;margin-right: 10px;" href="dish/{{$dish->id}}/edit" class="btn btn-warning">Edit</a>
	                    	<form action="/dish/{{$dish->id}}" method="POST">
											    	@csrf
											    	@method('DELETE')
											    	<button type="submit" class="btn btn-danger">DELETE</button>
												</form>
												</div>
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
