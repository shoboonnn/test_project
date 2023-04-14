<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodcts;
use App\Http\Requests\ContactRequest;


class UpdateController extends Controller
{
    //DB更新
    public function upDate(ContactRequest  $request)
    {   
        //BDのID取得
        $id = $request->input('searchId');
        $edit = Prodcts::find($id);
        
        //BD更新
        $Prodcts = new Prodcts;
        $search = $Prodcts ->upDate();
        $edit->id = $request->id;
        $edit->product_name = $request->product_name;
        $edit->company_id = $request->company_id;
        $edit->price = $request->price;
        $edit->stock = $request->stock;
        $edit->comment = $request->comment;

        //画像があったら画像を更新
        if($request->file('img_path') !== null){
        $image = $request->file('img_path')->store('img','public');                
        $edit->img_path = $request->file('img_path')->store('storage/img');
        $edit->save(); 
        }else{
        $edit->save();
        }
        return redirect()->back()->with('message', '更新完了しました');
    }
}
