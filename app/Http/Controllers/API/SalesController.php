<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Prodcts;

class SalesController extends Controller
{
    public function index(Request $request){
        //トランザクション
        DB::beginTransaction();
        try{
            //在庫
            $id = $request->input('id');
            $stockItem = Products::find($id ,'stock');
            //在庫あり
            if( $stockIem > 0){
            $Sales = new Sales;
            $post = $Sales->crate($request);
            //BDコミット
            DB::commit();
            }else{
                return ;
            }
        }catch(\Exception $e){
            //BDロールバック
            BD::rollback();
            return back();
        }
    }
}
