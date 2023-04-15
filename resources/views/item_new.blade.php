@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                   <h1>新規登録</h1>
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
                            <label>商品名:</label>
                            <input type="text" name="txtProductName"autocomplete="off">
                         </div>
                        <div>
                            <label>メーカー:</label>
                            <input type="text" name="drpCompanyId" list="companyList" placeholder="新規入力か選択肢"autocomplete="off">
                            <datalist id="companyList">
                            @foreach($all_items->unique('company_id') as $all_item)
                                <option name="{{ $all_item->company_id }}">{{ $all_item->company_id }}</option>
                            @endforeach
                            </datalist>
                        </div>
                        <div>
                            <label for="numPrice">価格:</label>
                            <input type="number" name="numPrice"autocomplete="off">
                        </div>
                        <div> 
                            <label>在庫数:</label>
                            <input type="number" name="numStock"autocomplete="off">
                        </div>
                        <div> 
                            <label>コメント:</label>
                            <input type="textarea" name="areaComment"autocomplete="off">
                        </div>
                        <div>
                            <label for="imgPath">商品画像:</label>
                            <input type="file" name="drpImgPath">
                        </div>
                        <input type="submit" value="登録">
                     {{ csrf_field() }}                        
                    </form>
                    <form action="{{ route('item.index')}}">
                        @csrf
                        <input type="submit"value="戻る">
                    </form>
                                      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
