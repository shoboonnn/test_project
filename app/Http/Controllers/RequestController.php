<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodcts;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\DB;


class RequestController extends Controller
{
    //ページ遷移用ID取得
    public function idGet(Request $request) {
        //ID取得
        $id = $request->input('btnSearchId');
        $search = Prodcts::find($id);
        
        //値を返す
        return $search;
    }

    //BDから削除
    public function del(Request $request) {
        //dd($request->all());

        //トランザクション
        DB::beginTransaction();
        try{
        //削除ID取得
        $id = $request->input('delID');
        $allItems = Prodcts::find($id);
    
        //項目削除
        $allItems->delete();
        
        //BDコミット
        DB::commit();
        }catch(\Exception $e){
            //BDロールバック
            BD::rollback();
            return back();
        }
        //メッセージ
        //$message = config('const.message.del');

        //表示
        //return redirect('home')->with('message', $message);
    }

    //ページ遷移時ID取得
    public function search(Request $request) { 
        //ページ遷移用ID取得
        $search = $this->idGet($request);

        //表示
        return view('item_search', compact('search'));
    }

    //ページ遷移時ID取得とBD呼び込み
    public function edit(Request $request) {
        //セレクトボックス用
        $edits = Prodcts::all();

        //ページ遷移用ID取得
        $search = $this->idGet($request);

        //表示
        return view('item_edit', compact('search','edits'));
    }
}
