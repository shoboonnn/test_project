<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prodcts;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ContactRequest;

class SortItemController extends Controller
{
    //一覧表示と絞り込み検索
    public function index(Request $request)
    {
        //一覧表示
        $all_items = Prodcts::all();

        //絞り込み情報得る
        $product_name = $request->input('txtProductName');
        $company_id = $request->input('drpCompanyId');

        //商品絞り込み
        $price_low = $request->input('numPriceLow');
        $price_high = $request->input('numPriceHigh');

        //在庫絞り込み
        $stock_low = $request->input('numStockLow');
        $stock_high = $request->input('numStockHigh');



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

        //表示
        return view('home', compact('all_items'));
    }
}
