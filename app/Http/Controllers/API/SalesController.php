<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Prodcts;
use Illuminate\Support\Facades\DB;


class SalesController extends Controller
{
    public function index(Request $request){
        
        $stock = Prodcts::find($request->product_id,'stock');
        //$stock = 1;

        if($stock->stock  > 0) {
        //購入
        $Sales = new Sales();
        $post = $Sales->buy($request);


        return response()->json(
            [
                'product_id' => $request->input('product_id'),
                'data' => Prodcts::find($request->product_id,'stock')
            ]
        );
        }else{
            return response()->json(
                [
                    'product_id' => $request->input('product_id'),
                    'messege' => 'er'
                ]
            );

        };
    }
}
