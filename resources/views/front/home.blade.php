@extends('layouts.main')


@section('content')
    <br><br><br>
        <h2 style="text-align: center; color: #474A4C;">
            <strong>
                          Welcome To Mazad Bids
            </strong>
        </h2>
    <br>
        <p style="text-align: center; font-size: 20px;">Whether you’re a bidder or a seller, you came to the right place!</p>
        <p style="text-align: center; font-size: 20px;">   Mazad Bids is the easiest way to shop brand new products with the cheapest prices,</p>
        <p style="text-align: center; font-size: 20px;">and the best way to gain some money out of selling your unused items! Let the bidding games begin…</p>
    <div class="subheader text-center">
        <br>
        <h2 style="color: #FC7315; text-align: center;">
            Latest Items
        </h2>
    </div>
    <div class="home-form">
        <form method="post">
            {{csrf_field()}}
            <input type="text" class="form-control" id="search" name="search" placeholder="Search Here..">
        </form>
    </div>

    <!-- Latest SHirts -->
    <div class="block">
        @foreach($items as $item)
        <div class="small-3 columns">
            <div class="item-wrapper">
                <div class="img-wrapper">
                    <a href="admin/itemDetails/{{$item->id}}" class="button expanded add-to-cart">
                        Item Details
                    </a>
                    <a href="#" class="item-image">
                        <img src="{{$item->image}}"/>
                    </a>
                </div>
                <h3 class="item-name">
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
    <!-- Footer -->
    <br>
    <script type="text/javascript">
        $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type:'post',
                url:'search',
                data:{'search':$value},
                success:function(data){
                     $('.block').empty();
                     res = JSON.parse(data);
                     for (var i = 0; i < res.length; i++) {
                        var body = $("<div></div>").addClass("small-3 columns");
                        $('.block').append(body);
                        var item = $("<div></div>").addClass("item-wrapper");
                        body.append(item);
                        var a = $("<a></a>").addClass("button expanded add-to-cart").attr({"href" : "admin/itemDetails/"+res[i].id}).text("Item Details");
                        item.append(a);
                        var image = $("<a></a>").addClass("item-image").attr({"href" : "#"});
                        item.append(image);
                        var image2 = $("<img/>").attr({"src" : res[i].image});
                        image.append(image2);
                        var h3 = $("<h3></h3>").addClass("item-name").text(res[i].name);
                        item.append(h3);
                        var h4 = $("<h4></h4>").text("Price: $"+res[i].price);
                        item.append(h4);
                        var h5 = $("<h5></h5>").text("Heighst Bid: $"+res[i].bid);
                        item.append(h5);
                        var no_bid = $("<h5></h5>").text("No of bid:"+res[i].bid);
                        item.append(no_bid);
                        var owner = $("<h5></h5>").text("Owner: "+res[i].user);
                        item.append(owner);
                         var description = $("<p></p>").text(res[i].description);
                        item.append(description);       

                     }
            }
            });
        })
</script>
    @endsection