@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                   <p>item_search</p>
                   <table>
                     <tr>
                        <th>id</th>
                        <th>商品画像</th>
                        <th>商品名</th>
                        <th>メーカー</th>
                        <th>価格</th>
                        <th>在庫数</th>
                        <th>コメント</th>
                     </tr>
                     <tr>
                       <td>{{ $search->id }}</td>
                       <td>{{ $search->img_path }}</td>
                       <td>{{ $search->product_name }}</td>
                       <td>{{ $search->company_id }}</td>
                       <td>{{ $search->price }}</td>
                       <td>{{ $search->stock }}</td>
                       <td>{{ $search->comment }}</td>
                    </tr>
                    </table>
                    <form action="{{ route('Item.upDate')}}">
                        @csrf
                        <input name="searchId" value="{{ $search->id }}" type="hidden">
                        <input type="submit" value="編集" >
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
