@extends('admin.layout.admin')
@section('content')
    <div class="container-fluid">
      <div class="col-sm-12 edit-header">
    	<h1>Edit {{Auth::user()->name}} Profile</h1>
    </div>
		<form method="post" action="" enctype="multipart/form-data">
			   {{csrf_field()}}

 		<div class="form-group row" >
		    <label class="col-sm-3 text-right">Name</label>
		   <div class="col-sm-9">
		   	<input type="text" name="name" class="form-control" id="itemName" placeholder="Enter your name" value="{{$users->name}}">
		  </div>
		</div>
		<div class="form-group row" >
		    <label class="col-sm-3 text-right">Email</label>
		   <div class="col-sm-9">
		   <input type="email" name="email" class="form-control" id="itemPrice" placeholder="Enter your email" value="{{$users->email}}">
		  </div>
		</div>	
		<div class="form-group row" >
		    <label class="col-sm-3 text-right">Location</label>
		   <div class="col-sm-9">
		   <input type="text" name="location" class="form-control" id="itemPrice" placeholder="Enter location" value="{{$users->location}}">
		  </div>
		</div>		  
		   <div class="form-group form-check">
		  <div class="form-group row"></div>
		  <label class="col-sm-3"></label>
		  <div class="col-sm-9">
		  	 <button type="submit" class="btn btn-primary edit-button">Edit</button>
		  </div>
		</form>
	</div>
	<div>
		<ul style="text-align:left; ">
		@foreach($errors->all() as $error)
		<li style="display: block;">{{$error}}</li>
		@endforeach
		</ul>
	</div>
@endsection