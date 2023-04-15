<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodcts;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\UpdateController;


class NewItemController extends Controller
{
    public function index() {
        //一覧表示
        $all_items = Prodcts::all();
        //表示
        return view('item_new', compact('all_items'));
    }

    public function create(ContactRequest $request) {
        //DB更新
        $prodcts = new Prodcts;
        $post = $prodcts->crate($request);

        //表示
        return redirect(route('new.create'))->with('message', '登録完了しました');
    }
}
