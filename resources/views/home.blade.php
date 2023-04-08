@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <p>home</p>
                    <input type="textarea">
                    <select name="example">
                        @foreach($allItems as $allItem)
                        <option value="{{ $allItem->company_id }}">{{ $allItem->company_id }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="検索">
                    <a href="{{ url('/new') }}"> 新規 </a>
                    <table>
                     <tr>
                        <th>id</th>
                        <th>商品画像</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>在庫数</th>
                        <th>メーカー名</th>
                     </tr>
                     @foreach($allItems as $allItem)
                     <tr>
                       <td>{{ $allItem->id }}</td>
                       <td>{{ $allItem->img_path }}</td>
                       <td>{{ $allItem->product_name }}</td>
                       <td>{{ $allItem->price }}</td>
                       <td>{{ $allItem->stock }}</td>
                       <td>{{ $allItem->company_id }}</td>
                     </tr>
                     @endforeach
                    </table>
                    <a href="{{ url('/search') }}"> 詳細 </a>                    
                    <input type="submit" value="削除">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
