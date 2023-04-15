<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodcts;
use App\Http\Requests\ContactRequest;
use App\Http\Controllers\NewItemController;



class UpdateController extends Controller
{
    //DB更新
    public function upDate(ContactRequest  $request){   
        //BDのID取得
        $id = $request->input('btnSearchId');

        //BD更新
        $prodcts = new Prodcts;
        $post = $prodcts->updateOne($id, $request);

        //表示
        return redirect()->back()->with('message', '更新完了しました');
    }
}
