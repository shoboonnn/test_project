<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\NewItemController;
use App\Http\Requests\SortItemController;
use Kyslik\ColumnSortable\Sortable;
use App\Models\Sales;




class Prodcts extends Model
{
    use HasFactory;
    use Sortable;

    protected $fillable = [
        'id',
        'product_name',
        'company_id',
        'price',
        'stock',
        'comment',
        'img_path'
    ];

    //絞り込み検索用
    public function itemSearch($all_items ,$product_name ,$company_id ,$price_low ,$price_high ,$stock_low ,$stock_high ) {
        //メーカー検索、名前検索、アンド検索
        if(strpos($product_name,'000') !== false){
            $all_items = Prodcts::where('company_id', 'like', "$company_id")
            ->get();
        }elseif(strpos($company_id,"未選択") !== false){
            $all_items = Prodcts::where('product_name', 'like', "%{$product_name}%")
            ->get();
        }elseif(!empty($product_name)) {
            $all_items = Prodcts::where('product_name', 'like', "%{$product_name}%")
            ->where('company_id', 'like', "$company_id")
            ->get();
        }

        //価格最大値
        if(!empty($price_high)) {    
            $all_items = Prodcts::where('price', '>=', $price_high)
            ->get();
        }
        //価格最小値
        if(!empty($price_low)) {
            $all_items = Prodcts::where('price', '<=', $price_low)
            ->get();
        }
        
        //在庫最大値
        if(!empty($stock_high)) {    
            $all_items = Prodcts::where('stock', '>=', $stock_high)
            ->get();
        }
        //在庫最小値
        if(!empty($stock_low)) {
            $all_items = Prodcts::where('stock', '<=', $stock_low)
            ->get();
        }
        /*
        //昇順・降順(id)
        if($UpDown == 'asc'){
            $all_items = Prodcts::orderBy($table_name, 'asc')->get();
        } elseif($UpDown == 'desc') {
            $all_items = Prodcts::orderBy($table_name, 'desc')->get();
        } else {
            return $this->all();
        }*/

        //値を返す
        return $all_items;
    }

    //商品登録
    public function crate($request) {
        //DB新規
        $post = new Prodcts;
        $post->id = $request->id;
        $post = $this->dbUp($post, $request);
  
        //画像があったら画像投稿
        $post = $this->imageUp($post, $request);
        return $post;
    }

    //商品編集
    public function updateOne($id, $request) {
        //BDのID取得
        $post = Prodcts::find($id);

        //DB更新
        $post = $this->dbUp($post, $request);

        //画像があったら画像投稿
        $post = $this->imageUp($post, $request);
        return $post;
    }

    //画像があったら画像投稿する共通部
    public function imageUp($post ,$request) {
        //画像有で投稿、画像無でBDの書換のみ
        if($request->file('drpImgPath') !== null){
        $image = $request->file('drpImgPath')->store('img','public');                
        $post->img_path = $request->file('drpImgPath')->store('storage/img');
        $post->save(); 
        }else{
        $post->save();
        }
        
        //値を返す
        return $post;
    }

    //BD更新共通部
    public function dbUp($post, $request) {
        //商品名、メーカー、値段、在庫、コメント
        $post->product_name = $request->txtProductName;
        $post->company_id = $request->drpCompanyId;
        $post->price = $request->numPrice;
        $post->stock = $request->numStock;
        $post->comment = $request->areaComment;

        //値を返す
        return $post;
    }
}
