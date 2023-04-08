@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                   <h1>item_new</h1>
                   @if (session('message'))
                        <div class="message">
                            {{ session('message') }}
                        </div>
                    @endif
                   <form action="{{route('new.create')}}" method="POST">
                       <div>
                            <label for="productName">商品名</label>
                            <input type="text" name="product_name">
                        </div>
                       <div>
                            <label for="companyId">メーカー</label>
                            <select name="company_id">
                                <option value="サンプル1" >サンプル1</option>
                                <option value="サンプル2" >サンプル2</option>
                                <option value="サンプル3" >サンプル3</option>
                            </select>
                        </div>
                       <div>
                            <label for="price">価格</label>
                            <input type="number" name="price">
                        </div>
                       <div> 
                            <label for="stock">在庫数</label>
                            <input type="number" name="stock">
                        </div>
                       <div> 
                            <label for="comment">コメント</label>
                            <input type="textarea" name="comment">
                        </div>
                       <div>
                            <label for="imgPath">商品画像</label>
                            <input type="file" name="img_path">
                        </div>
                    <input type="submit" value="登録">
                    {{ csrf_field() }}                        
                    </form>
                   <a href="{{ url('/home') }}"> 戻る </a>
                                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
