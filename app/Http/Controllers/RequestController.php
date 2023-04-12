<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodcts;
use App\Http\Requests\ContactRequest;


class RequestController extends Controller
{
    //BDから削除
    public function del(Request $request)
    {
        $id = $request->input('delId');
        $allItems = Prodcts::find($id);
        $allItems->delete();

        return redirect('home');

    }

    //ページ遷移時ID取得
    public function search(Request $request)
    { 
        $id = $request->input('searchId');
        $search = Prodcts::find($id);  

        return view('item_search', compact('search'));

    }

    //ページ遷移時ID取得とBD呼び込み
    public function edit(Request $request)
    {
        $edits = Prodcts::all();
        $id = $request->input('searchId');
        $search = Prodcts::find($id);

        return view('item_edit', compact('search','edits'));

    }

}
