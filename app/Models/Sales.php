<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\API\SalesController;


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
        //購入履歴
        $post = new Sales;
        $post->id = $request->id;
        $post->product_id = $request->product_id;
        $post->save();

        //在庫を減らす
        Prodcts::where('id', $request->product_id)->decrement('stock', 1);

        return $post;
     
    }


}
