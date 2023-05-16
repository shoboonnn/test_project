<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodcts;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;

class SortItemController extends Controller
{
    //一覧表示と絞り込み検索
    public function index(Request $request){
        //一覧表示
        $all_items = Prodcts::all();

        //dd($request->all());
        $data = $request->get('data');

        //絞り込み情報得る
        $product_name = $request->get('data.product_name');
        $company_id = $request->get('data.company_id');
         
        //商品絞り込み
        $price_low = $request->get('data.price_low');
        $price_high = $request->get('data.price_high');

        //在庫絞り込み
        $stock_low = $request->get('data.stock_low');
        $stock_high = $request->get('data.stock_high');        
        
        //昇順+降順
        $UpDown = $request->input('UpDown');


        //絞り込み処理
        $prodcts = new Prodcts;
        $all_items = $prodcts->itemSearch(
             $all_items,
             $product_name,
             $company_id,
             $price_low,
             $price_high,
             $stock_low,
             $stock_high,
             $UpDown,
        );

        //表示
        return view('home', compact('all_items'));
        //return response()->json(['data' => $all_items]);
    }
    
    public function sortItem(){

    }

}
