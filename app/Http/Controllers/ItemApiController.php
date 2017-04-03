<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class ItemApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::select('SELECT *, users.name as user FROM users,items WHERE users.id=items.user_id');
         return response()->json($items,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        $affected = DB::update("update items set bid=$value, no_bid=$no_bid where id = $id ");

        return response()->json($item,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = DB::select("SELECT *, users.name as user, users.id as user_id FROM users,items WHERE users.id=items.user_id AND items.id=$id");
        return response()->json($item,200);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
