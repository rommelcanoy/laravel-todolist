<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
    //
    public function index()
    {
        return view('welcome', ['itemList' => ListItem::where('is_complete', 0)->get()]);
    }

    public function markComplete($id)
    {
        // \Log::info($id);
        $listItem = ListItem::find($id);
        // \Log::info($listItem);
        $listItem->is_complete = 1;
        $listItem->save();

        return redirect('/');
    }

    public function addItem(Request $request)
    {
        // this logs the request
        // \Log::info(json_encode($request->all()));
        $newListItem = new ListItem;
        $newListItem->name = $request->item;
        $newListItem->is_complete = 0;
        $newListItem->save();
        // return view('welcome', ['itemList' => ListItem::all()]);
        return redirect('/');
    }
}
