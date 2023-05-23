<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodcts;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;

class SortItemController extends Controller
{
    //一覧表示
    public function index(){
        //一覧表示
        $all_items = Prodcts::sortable()->get();
        
        //dd($request);
        //dd($request->all());
        //表示
        return view('home', compact('all_items'));
    }
    
    
    //絞り込み
    public function sortItem(Request $request){
        //dd($request);
        //dd($request->all());
        $all_items = Prodcts::all();


        //絞り込み情報得る
        $product_name = $request->input('product_name');
        $company_id = $request->input('company_id');
         
        //商品絞り込み
        $price_low = (int)$request->input('price_low');
        $price_high = (int)$request->input('price_high');

        //在庫絞り込み
        $stock_low = (int)$request->input('stock_low');
        $stock_high = (int)$request->input('stock_high');        

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
        );

        return response()->json($all_items);
    }

}
