<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodcts;
use App\Http\Requests\ContactRequest;


class NewItemController extends Controller
{
    public function index() {
        $allItems = Prodcts::all();
        return view('item_new', compact('allItems'));
    }

    public function create(ContactRequest $request) {

        //DBを更新
        $post = new Prodcts();
        $post->product_name = $request->product_name;
        $post->company_id = $request->company_id;
        $post->price = $request->price;
        $post->stock = $request->stock;
        $post->comment = $request->comment;

        //画像があったらDBに投稿
        if($request->file('img_path') !== null){
        $image = $request->file('img_path')->store('img','public');                
        $post->img_path = $request->file('img_path')->store('storage/img');
        $post->save(); 
        }else{
        $post->save();
        }
        return redirect(route('new.create'))->with('message', '登録完了しました');
    }
}

