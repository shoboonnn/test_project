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
        $id = $request->input('searchId');
        $edit = Prodcts::find($id);
        
        $Prodcts = new Prodcts;
        $search = $Prodcts ->upDate();
        $edit->id = $request->id;
        $edit->product_name = $request->product_name;
        $edit->company_id = $request->company_id;
        $edit->price = $request->price;
        $edit->stock = $request->stock;
        $edit->comment = $request->comment;
        $edit->img_path = $request->img_path;
        $edit->save();
        
        return redirect()->back()->with('message', '更新完了しました');

    }
}
