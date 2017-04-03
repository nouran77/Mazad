<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Item;

use App\User;

use Illuminate\Support\Facades\Auth;

use Mail;

use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
            $items = DB::select('SELECT *, users.name as user FROM users,items WHERE users.id=items.user_id');
            return view('front.home',compact('items'));
    }


    public function itemDetails($id)
    {   
         $item = DB::select("SELECT *, users.name as user, users.id as user_id FROM users,items WHERE users.id=items.user_id AND items.id=$id");
        return view('front.itemDetails', compact('item'));
    }

    public function add()
    {
        return view('admin.add');
    }

    public function store(Request $request)
    {
//        dd($request->all());
//        $this->validate(request() ,[
//            'name' => 'required|max:100',
//            'price'=> 'required|integer',
//            'desc' => 'required|max:140',
////            'image' => 'image|mimes:jpeg,bmp,png|max:10000'
//        ]);

//        $image = $request->file('image');
        $image = $request->file('image')->store('images');
//        dd($image);

        $name= $request->get('name');
        $price= $request->get('price');
        if($request->get('state') == null){
            $online=false;
        }
        if($request->get('state') =='on'){
            $online=true;
        }
        $desc = $request->get('desc');
        $Item = new Item();
        $Item->name = $name;
        $Item->description = $desc;
        $Item->price = $price;
        $Item->online = $online;
        $Item->image = $image;
        $Item->user_id=Auth::id();
        $Item->save();
        return redirect("admin");
    }



     public function search(Request $request)
    {
            
        $items = DB::table('users')
        ->join('items','users.id' ,'=','items.user_id')
        ->select('*','users.name as user')
        ->where('items.name','like','%'.$request->search.'%')
        ->get();
            return json_encode($items);
            //return \Response::json($items);

    }
        

    public function bidItem(Request $request){
        $this->validate(request() ,[
            'id' => 'required|integer',
            'bid'=> 'required|integer'
        ]);

        $id = $request->get("id");
        $value=$request->get("bid");

        $item = DB::select("SELECT *, users.name as user, users.id as user_id FROM users,items WHERE users.id=items.user_id AND items.id=$id");
        
        $bid=$item[0]->bid;
        $no_bid=$item[0]->no_bid;
        $no_bid+=1;

        if($value>$bid)
        {
        }else{
            $value=$bid;
        }
        //dd($id);
        $affected = DB::update("update items set bid=$value, no_bid=$no_bid where id = $id ");


        $data["mail"]=$item[0]->email;
        Mail::send('email', $data, function($message) use ($data){
            $message->from('testandtry10@gmail.com','Mazad');
            $message->to($data["mail"] ,'mazad');
            $message->subject("New Bid");
        });
        return redirect('/');
    }



    public function deleteItem($id){
        $item = Item::find($id);
        $item->delete();
        return back();
    }
    public function editItem($id){
        $items = Item::find($id);
        if($items->online){
            $on = "checked";
        }else
        {
            $on="";
        }
        return view('admin.edit',compact('items','on'));
    }

    public function updateItem(Request $request,$id)
    {
        $this->validate(request() ,[
            'name' => 'required|max:100',
            'price'=> 'required|integer',
            'desc' => 'required|max:140',
        ]);

        $image = $request->file('image');
        $name= $request->get('name');
        $price= $request->get('price');
        $desc = $request->get('desc');
        if($request->get('state')=='on'){
            $online = 1;
        }else
        {
            $online=0;
        }
        $Item = Item::find($id);
        $Item->name = $name;
        $Item->description = $desc;
        $Item->price = $price;
        $Item->online = $online;
        if($image){
            $image = $request->file('image')->store('images');
            $Item->image = $image;
        }
        $Item->save();
        return redirect("admin");
    }


}
