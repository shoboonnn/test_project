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

        $allItems = Prodcts::all();
        $product_name = $request->input('product_name');
        $company_id = $request->input('company_id');

        if(strpos($product_name,'000') !== false){
            $allItems = Prodcts::where('company_id', 'like', "$company_id")
            ->get();
        }elseif(!empty($product_name)) {
            $allItems = Prodcts::where('product_name', 'like', "%{$product_name}%")
            ->where('company_id', 'like', "$company_id")
            ->get();
        }
        
        return view('home', compact('allItems'));

    }

}