@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                   <h1>商品詳細</h1>
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
                       <td><img src="{{ asset($search->img_path) }}"height="50px"width="50px"></td>
                       <td>{{ $search->product_name }}</td>
                       <td>{{ $search->company_id }}</td>
                       <td>{{ $search->price }}</td>
                       <td>{{ $search->stock }}</td>
                       <td>{{ $search->comment }}</td>
                    </tr>
                    </table>
                    <form action="{{ route('item.upDate')}}">
                        @csrf
                        <input name="btnSearchId" value="{{ $search->id }}" type="hidden">
                        <input type="submit" value="編集" >
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
