<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\api\SalesController;


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
        $Sales = new Sales();
        $Sales->product_id = $request->input('product_id');   
        $Sales->save();

        return $request;
     
    }


}
