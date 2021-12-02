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
		        <h3 class="card-title">Edit Dish</h3>
		          <a href="/dish" class="btn btn-default float-right">Back</a>
		    </div>
		      <!-- /.card-header -->
	      	<div class="card-body">
	      	@if ($errors->any())
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
					@endif
	      		<form action="/dish/{{$dish->id}}" method="POST" enctype="multipart/form-data">
	      			@csrf
	      			@method('PUT')
	      			<div class="form-group">
	      				<label>Name</label>  
	            	<input type="text" class="form-control" name="name" value="{{old('name',$dish->name)}}"> 
	      			</div>
	      			<div class="form-group">
	      				<label>Category</label>  
	            	<select name="category_id" class="form-control">
	            		@foreach($categories as $cat)
	            		 <option value="{{$cat->id}}" {{$cat->id == $dish->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
	            		@endforeach	
	            	</select>
	      			</div>
	      			<div class="form-group">
	      				<label>Image</label> <br>
	      				<img src="{{url('/images/',$dish->image)}}" width=100 height=100> <br><br>
	            	 <input type="file" name="dish_image" class="form-control" multiple="">
	      			</div>
	      			  <button type="submit" class="btn btn-success">Upload</button>
	      		</form>
	             
	          
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
