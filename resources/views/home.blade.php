@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <p>home</p>
                    <form action="{{ route('Item.index') }}" method="GET">
                        @csrf
                    <input type="textarea" name="product_name" value="{{ $product_name }}">
                    <select name="company_id">
                        @foreach($allItems->unique('company_id')  as $allItem)
                          <option value="{{ $allItem->company_id }}">{{ $allItem->company_id }}</option>
                        @endforeach
                    </select>
                    <input type="submit" value="検索">
                    </form>
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
                       <td>                            
                            <form action="{{ route('Item.search')}}">
                                @csrf
                                <input name="searchId" value="{{ $allItem->id }}" type="hidden">
                                <input type="submit" value="詳細">
                            </form>
                        </td>
                       <td>
                            <form action="{{ route('Item.del')}}" method="POST">
                                @csrf
                                <input name="delId" value="{{ $allItem->id }}" type="hidden">
                                <input type="submit" value="削除" onClick="return confirm('本当に削除しますか?');">
                            </form>
                        </td>
                     </tr>
                     @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
