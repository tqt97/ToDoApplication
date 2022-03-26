<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{

    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get();
    }

    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->item['name'];
        $newItem->save();
        return $newItem;
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        if ($item) {
            $item->completed = $request->item['completed'] ? true : false;
            $item->completed_at =  $request->item['completed'] ? Carbon::now() : null;
            $item->save();
            return $item;
        }
        return "Item not found";
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        if ($item) {
            $item->delete();
            return "Item deleted";
        }
        return "Item not found";
    }
}
