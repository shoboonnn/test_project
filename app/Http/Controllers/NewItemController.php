<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodcts;

class NewItemController extends Controller
{
    public function index() {
        return view('item_new');
    }

    public function create(Request $request) {

        $post = new Prodcts();
        /*$Item->create([
            'product_name'=> 'test',
            'company_id'=> 'test',
            'price'=> '1000',
            'stock'=> '1000',
            'comment'=> 'test',
            'img_path'=> 'test'
        ]);*/
        $post->product_name = $request->product_name;
        $post->company_id = $request->company_id;
        $post->price = $request->price;
        $post->stock = $request->stock;
        $post->comment = $request->comment;
        $post->img_path = $request->img_path;
        $post->save();

        return redirect(route('new.create'))->with('message', '登録完了しました');

    }
}
