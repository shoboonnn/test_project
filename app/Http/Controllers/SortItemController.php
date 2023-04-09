<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodcts;
use Illuminate\Support\Facades\DB;

class SortItemController extends Controller
{
    public function index(Request $request)
    {

        $allItems = Prodcts::all();
        $product_name = $request->input('product_name');
        $company_id = $request->input('company_id');

        if(!empty($product_name)) {
            $allItems = Prodcts::where('product_name', 'like', "%{$product_name}%")
            ->where('company_id', 'like', "$company_id")
            ->get();
        }
        //$posts = $allItems->paginate(10);
        
        return view('home', compact('product_name','allItems'));

    }
    
    public function del(Request $request)
    {
        $id = $request->input('delId');
        $allItems = Prodcts::find($id);
        $allItems->delete();

        return redirect('home');

    }

    public function search(Request $request)
    {
        $id = $request->input('searchId');
        $search = Prodcts::find($id);

        return view('item_search', compact('search'));

    }

    public function edit(Request $request)
    {
        $edits = Prodcts::all();
        $id = $request->input('editId');
        $edit = Prodcts::find($id);

        return view('item_edit', compact('edit','edits'));

    }

    public function upDate(Request $request)
    {   
        $id = $request->input('editId');
        $edit = Prodcts::find($id);
        $edit->product_name = $request->product_name;
        $edit->company_id = $request->company_id;
        $edit->price = $request->price;
        $edit->stock = $request->stock;
        $edit->comment = $request->comment;
        $edit->img_path = $request->img_path;
        $edit->save();
        $edits = Prodcts::all();
        
    return view('item_edit', compact('edit','edits'))->with('message', '更新完了しました');

    }

}