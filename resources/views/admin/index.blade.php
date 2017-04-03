@extends('admin.layout.admin')
@section('content')


    <div class="row">
        @foreach($items as $item)
        <div class="col-sm-4">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="#">
                        <img src="{{$item->image}}" style="width: 200px; height: 200px;"/>
                    </a>
                </div>
               <div class="col-sm-12 item-options">
                    <a style="margin: 20px;" class="glyphicon glyphicon glyphicon-trash btn btn-primary" href="admin/delete/{{$item->id}}"></a>
                <form method="post">
                    {{csrf_field()}}
                    <a type="submit" href="admin/edit/{{$item->id}}" class="glyphicon glyphicon-edit btn btn-danger"></a>
                </form>
               </div>
                <h3 class="item-title">
                        {{ $item->name }}
                </h3>
                <h4>
                   Price: ${{$item->price}}
                </h4>
                <h5>
                   Heighst Bid: ${{$item->bid}}
                </h5>
                <h5>
                   No of bid: {{$item->no_bid}}
                </h5>
                <h5>
                   Owner: {{$item->user}}
                </h5>
                <p>
                    {{$item->description}}
                </p>
            </div>
        </div>
        @endforeach
    </div>

@endsection