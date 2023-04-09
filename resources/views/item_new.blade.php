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
                            <input type="text" name="company_id" list="companyList" placeholder="テキスト入力もしくはダブルクリック">
                            <datalist id="companyList">
                            @foreach($allItems->unique('company_id') as $allItem)
                                <option name="{{ $allItem->company_id }}">{{ $allItem->company_id }}</option>
                            @endforeach
                            </datalist>
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
