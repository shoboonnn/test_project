<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodcts;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\UpdateController;
use Illuminate\Support\Facades\DB;



class NewItemController extends Controller
{
    public function index() {
        //一覧表示
        $all_items = Prodcts::all();
        //表示
        return view('item_new', compact('all_items'));
    }

    public function create(ContactRequest $request) {
        // トランザクション
        DB::beginTransaction();

        try {
        //DB更新
        $prodcts = new Prodcts;
        $post = $prodcts->crate($request);
    
        //BDコミット
        DB::commit();
        } catch (\Exception $e) {
        //DBロールバック
        DB::rollback();
        return back();
        }    
        //メッセージ
        $message = config('const.message.new');
        //表示
        return redirect(route('new.create'))->with('message', $message);
    }
}
