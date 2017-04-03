@extends('admin.layout.admin')
@section('content')
    <div class="container-fluid">

    <div class="col-sm-12 edit-header">
    	<h1>Edit {{$items->name}}</h1>
    </div>
		<form method="post" action="" enctype="multipart/form-data">
			   {{csrf_field()}}
		  <div class="form-group row" >
		    <label for="exampleInputEmail1" class="col-sm-3 text-right">Name</label>
		   <div class="col-sm-9">
		   	 <input type="Item Name" name="name" class="form-control" id="itemName" placeholder="Enter item name" value="{{$items->name}}">
		   </div>
		  </div>
		  <div class="form-group row">
		    <label for="exampleInputPassword1" class="col-sm-3 text-right">Price</label>
		    <div class="col-sm-9">
		    	<input type="text" name="price" class="form-control" id="itemPrice" placeholder="Item Price" value="{{$items->price}}">
		    </div>
		  </div>
		 
		  
		  <div class="form-group row">
		    <label for="exampleInputPassword1" class="col-sm-3 text-right">Description</label>
		    <div class="col-sm-9">
		    	 <textarea class="form-control" id="exampleTextarea" name="desc" rows="3">{{$items->description}}</textarea>
		    </div>
		  </div>
		   <div class="form-group form-check">
		   <div class="col-sm-3"></div>
		    <label class="form-check-label col-sm-9">
		      <input type="checkbox" name="state" class="form-check-input" {{$on}}>
		      Online
		    </label>
		  </div>
		  <div class="form-group row">
		    <label for="exampleInputFile" class="col-sm-3 text-right">Image</label>
		   <div class="col-sm-7">
		   	 <input type="file" class="form-control" id="exampleInputFile" name="image" aria-describedby="fileHelp">
		     <small id="fileHelp" class="form-text text-muted">you can upload image for your item</small>
		   </div>
		   <div class="col-sm-2">
		   	<a href="#" class="edit-item-image">
                <img src="{{url($items->image)}}"/>
            </a>
		   </div>
		   
		  </div>
		  <div class="form-group row"></div>
		  <label for="exampleInputFile" class="col-sm-3"></label>
		  <div class="col-sm-9">
		  	 <button type="submit" class="btn btn-primary edit-button">Save Changes</button>
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