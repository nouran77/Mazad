@extends('admin.layout.admin')

@section('content')
    <div class="container-fluid">
      <div class="col-sm-12 edit-header">
    	<h1 style="color: #FC7315">Add New Item</h1>
    </div>
		<form method="post" action="add" enctype="multipart/form-data">
			   {{csrf_field()}}

 <div class="form-group row" >
		    <label for="exampleInputEmail1" class="col-sm-3 text-right">Name</label>
		   <div class="col-sm-9">
		   	<input type="Item Name" name="name" class="form-control" id="itemName" placeholder="Enter Name">
		  </div>
</div>
<div class="form-group row" >
		    <label for="exampleInputEmail1" class="col-sm-3 text-right">Price</label>
		   <div class="col-sm-9">
		   <input type="text" name="price" class="form-control" id="itemPrice" placeholder="Item Price">
		  </div>
</div>		  
		<div class="form-group row">
		    <label for="exampleInputPassword1" class="col-sm-3 text-right">Description</label>
		    <div class="col-sm-9">
		    	<textarea class="form-control" id="exampleTextarea" name="desc" rows="3" placeholder="Description"></textarea>
		    </div>
		  </div>
		   <div class="form-group form-check">
		   <div class="col-sm-3"></div>
		    <label class="form-check-label col-sm-9">
		       <input type="checkbox" name="state" class="form-check-input">
		      Online
		    </label>
		  </div>
		  <div class="form-group row">
		    <label for="exampleInputFile" class="col-sm-3 text-right">Image</label>
		   <div class="col-sm-9">
		   	<input type="file" class="form-control" id="exampleInputFile" name="image" aria-describedby="fileHelp">
		     <small id="fileHelp" class="form-text text-muted">you can upload image for your item</small>
		   </div>
		   
		  </div>
		  <div class="form-group row"></div>
		  <label for="exampleInputFile" class="col-sm-3"></label>
		  <div class="col-sm-9">
		  	 <button type="submit" class="btn btn-primary edit-button">Add</button>
		  </div>

		</form>
	</div>
	<div>
		<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
		</ul>
	</div>
@endsection