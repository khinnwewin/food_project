<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="/plugins/sweetalert2/sweetalert2.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>
<body>
	<div class="card">
		<div class="card-body">
			@if (session('message'))
			    <div class="alert alert-success">
			        {{ session('message') }}
			    </div>
			@endif
			<div class="row">
	          <div class="col-12">
	            <h3>Order Form</h3>
	          </div>
        	</div>
        <!-- ./row -->
        <div class="row">
          <div class="col-12 ">
            <div class="card card-primary card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">New Order</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Order Lists</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <form action="{{route('order.submit')}}" method="post">
                     	@csrf
                    <div class="row">
                	@foreach($dishes as $dish)
					<div class="col-sm-3">
					    <div class="card">
					      <div class="card-body">
					        <img src="{{url('/images/'.$dish->image)}}" width=100 height=100><br><br>
	                     	<label for="">{{$dish->name}}</label>
	                     	<input type="number" name="{{$dish->id}}"><br>
					      </div>
					    </div>
					</div>
				  @endforeach
				</div>	
				<div class="form-group">
					<select name="table" id="">
					@foreach($tables as $table)
					<option class="form-control" value="{{$table->id}}">{{$table->number}}</option>
					@endforeach
					</select>
				</div>
				<input type="submit" class="btn btn-success" value="submit">
                </form> 
                </div>
                  <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                     <table class="table table-bordered table-striped">
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
                        <a href="order/{{$order->id}}/serve" class="btn btn-warning">Serve</a>
                      </th>
                    </tr>
                    @endforeach
                    </tbody>
                     </table> 
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
  
        <!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>