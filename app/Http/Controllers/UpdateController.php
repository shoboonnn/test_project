<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodcts;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\NewItemController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;



class UpdateController extends Controller
{
    //DB更新
    public function upDate(ContactRequest  $request){   
        // トランザクション
        DB::beginTransaction();

        try {
        //BDのID取得
        $id = $request->input('btnSearchId');

        //BD更新
        $prodcts = new Prodcts;
        $post = $prodcts->updateOne($id, $request);
    
        //BDコミット
        DB::commit();
        } catch (\Exception $e) {
        //DBロールバック
        DB::rollback();
        return back();
        }
        //メッセージ
        $message = config('const.message.up');
        //表示
        return redirect()->back()->with('message', $message);
    }
}
