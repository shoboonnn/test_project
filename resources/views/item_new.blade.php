@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                   <h1>item_new</h1>
                   <div>  
                        @if ($errors->any())  
                            <ul>  
                                @foreach ($errors->all() as $error)  
                                    <li>{{ $error }}</li>  
                                @endforeach  
                            </ul>  
                        @endif  
                    </div>
                   @if (session('message'))
                        <div class="message">
                            {{ session('message') }}
                        </div>
                    @endif
                   <form action="{{route('new.create')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="productName">商品名</label>
                            <input type="text" name="product_name"autocomplete="off">
                         </div>
                        <div>
                            <label for="companyId">メーカー</label>
                            <input type="text" name="company_id" list="companyList" placeholder="新規入力か選択肢"autocomplete="off">
                            <datalist id="companyList">
                            @foreach($allItems->unique('company_id') as $allItem)
                                <option name="{{ $allItem->company_id }}">{{ $allItem->company_id }}</option>
                            @endforeach
                            </datalist>
                        </div>
                        <div>
                            <label for="price">価格</label>
                            <input type="number" name="price"autocomplete="off">
                        </div>
                        <div> 
                            <label for="stock">在庫数</label>
                            <input type="number" name="stock"autocomplete="off">
                        </div>
                        <div> 
                            <label for="comment">コメント</label>
                            <input type="textarea" name="comment"autocomplete="off">
                        </div>
                        <div>
                            <label for="imgPath">商品画像</label>
                            <input type="file" name="img_path">
                        </div>
                        <input type="submit" value="登録">
                     {{ csrf_field() }}                        
                    </form>
                    <form action="{{ route('Item.index')}}">
                        @csrf
                        <input type="submit"value="戻る">
                    </form>
                                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
