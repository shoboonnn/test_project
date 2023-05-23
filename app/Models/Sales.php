<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\SalesController;
use Illuminate\Support\Facades\DB;



class Sales extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'product_id'
    ];

    //Prodcts取得
    public function ProdctsItems() {
        return $this->hasMany('App\Models\Prodcts','id');
    }

    //購入処理
    public function buy($request)
    {
        //トランザクション
        DB::beginTransaction();
        try{

        //購入履歴
        $Sales = new Sales();
        $Sales->product_id = $request->input('product_id');   
        $Sales->save();

        //在庫を減らす
        Prodcts::where('id', $request->product_id)->decrement('stock', 1);

        //BDコミット
        DB::commit();
        }catch(\Exception $e){
            //BDロールバック
            BD::rollback();
            return back();
        }
        return $request;
    }
}
