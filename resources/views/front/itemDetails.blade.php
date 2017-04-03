@extends('layouts.main')

@section('title','item')
@section('content')
    <!-- products listing -->
    <!-- Latest SHirts -->
    <div class="row">
        <div class="small-5 small-offset-1 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="#">
                        <img src="{{ url($item[0]->image)}}"/>
                    </a>
                </div>
            </div>
        </div>
    <div class="small-6 columns">

        <div class="item-wrapper">
            <h3 class="subheader">
                <span class="price-tag">{{$item[0]->name}}</span>
                <br>
                Price: ${{$item[0]->price}}

            </h3>
            <div class="row">
                <div class="large-12 columns">
                    <label>
                    <p style="color: #474A4C; font-weight: bold">
                    Description:  {{$item[0]->description}}
                    </p>
                        <p style="color: #474A4C; font-weight: bold">
                    Owner:  {{$item[0]->user}}
                    <br>
                        <p style="color: #474A4C; font-weight: bold">
                    Location:  {{$item[0]->location}}
                    </p>
                    </label>
                    <br>
                    <form method="post" action="bid">
                        <input type="text" name="bid" placeholder="Enter your bid here">
                        <input type="hidden" name="id" value="{{$item[0]->id}}">
                        <button type="submit" class="button expanded">Bid</button>
                    </form>
                </div>
            </div>
            <p class="text-left subheader">
        </div>
    </div>
    </div>
    @endsection