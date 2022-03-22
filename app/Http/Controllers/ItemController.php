<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Carbon\Carbon;
use App\Http\Resources\itemResource;

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
        $item = new Item();
        $item->name = $request->name;
        $item->save();

        if($item->save()){
            return $item;
        }
        return "Cannot store";
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
            if($item->completed){
                $item->completed = false;
                $item->completed_at = null;
            }else{
                $item->completed = true;
                $item->completed_at = Carbon::now();
            }

            if($item->save()){
                return $item;
            }
            return "Cannot update";
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