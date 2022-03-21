<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Carbon\Carbon;

class ItemController extends Controller
{

    public function index()
    {
        return Item::orderBy('created_at','DESC')->get();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $item = new Item;
        $item->name = request('name');
        $item->save();

        return $item;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $item = Item::find($id);
        if($item){
            $item->completed = request('completed') ? true : false;
            $item->completed_at = request('completed') ? Carbon::now() : null;
            $item->save();
            return $item;
        }
        return "Item not found";
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        if($item){
            $item->delete();
            return "Item Deleted Successfully";
        }
        return "Item not found";
    }
}
