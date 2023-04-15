@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                   <h1>商品編集</h1>
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
                <form action="{{ route('item.upDate')}}" method="POST" enctype="multipart/form-data">
                @csrf
                            <div>
                                <label>ID</label>
                                <input name="id" value="{{ $search->id }}" type="hidden">
                                {{ $search->id }}
                            </div>
                            <div>
                                <label>商品名:</label>
                                <input type="text" name="txtProductName" value="{{ $search->product_name }}"autocomplete="off">
                            </div>
                            <div>
                                <label>メーカー:</label>
                                <select name="drpCompanyId">
                                <option value="{{ $search->company_id }}">{{ $search->company_id }}</option>
                                /* @foreach($edits->unique('company_id') as $edit)
                                    <option value="{{ $edit->company_id }}">{{ $edit->company_id }}</option>
                                @endforeach*/
                                </select>
                            </div>
                            <div>
                                <label>価格:</label>
                                <input type="number" name="numPrice" value="{{ $search->price }}"autocomplete="off">
                            </div>
                            <div>
                                <label>在庫数:</label>
                                <input type="number" name="numStock" value="{{ $search->stock }}"autocomplete="off">
                            </div>
                            <div>
                                <label>コメント:</label>
                                <input type="textarea" name="areaComment" value="{{ $search->comment }}"autocomplete="off">
                            </div>
                            <div>
                                <label>商品画像:</label>
                                <input type="file" name="drpImgPath" value="{{ $search->img_path }}">
                            </div> 
                        <input name="btnSearchId" value="{{ $search->id }}" type="hidden">
                        <input type="submit" value="更新" >
                    </form>
                   <form action="{{ route('item.search')}}">
                        @csrf
                        <input name="btnSearchId" value="{{ $search->id }}" type="hidden">
                        <input type="submit" value="戻る" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
