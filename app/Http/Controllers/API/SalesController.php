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

        //購入
        $post = $Sales->buy($request);

        return response()->json(
            [
                'id' => $request->input('id'),
                'product_id' => $request->input('product_id'),
            ]
        );

    }
}
