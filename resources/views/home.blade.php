@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    <h1>商品一覧</h1>
                    @if (session('message'))
                        <div class="message">
                            {{ session('message') }}
                        </div>
                    @endif
                    <div>
                        <div>
                            <label>商品名</label>
                            <input type="textarea" id="txtProductName" name="txtProductName" placeholder="000でメーカー絞り込み">
                        </div>
                        <div>
                            <label>メーカー</label>            
                            <select id="drpCompanyId" name="drpCompanyId">
                                <option value="未選択">未選択</option>
                                @foreach($all_items->unique('company_id')  as $all_item)
                                <option value="{{ $all_item->company_id }}">{{ $all_item->company_id }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>価格</label>
                            <input type="number" id="numPriceLow" name="numPriceLow" placeholder="下限" autocomplete="off">
                            <input type="number" id="numPriceHigh" name="numPriceHigh" placeholder="上限" autocomplete="off">
                        </div>
                        <div>
                            <label>在庫</label>
                            <input type="number" id="numStockLow" name="numStockLow" placeholder="下限" autocomplete="off">
                            <input type="number" id="numStockHigh" name="numStockHigh" placeholder="上限" autocomplete="off">
                        </div>
                        <input id ="SortItem" type="submit" value="検索">
                        <select name="UpDown">
                            <option value="asc">id昇順</option>
                            <option value="desc">id降順</option>
                        </select>
                    </div>
                    <form action="{{ route('item.index')}}">
                        @csrf
                        <input type="submit"value="検索解除">
                    </form>
                    <form action="{{ route('new.create')}}">
                        @csrf
                        <input type="submit" value="新規">
                    </div>
                    <p id = "output"></p>
                    <table id = "test">
                     <tr>
                        <th>id</th>
                        <th>商品画像</th>
                        <th>商品名</th>
                        <th>価格</th>
                        <th>在庫数</th>
                        <th>メーカー名</th>
                     </tr>
                     @foreach($all_items as $all_item)
                     <tr>
                       <td>{{ $all_item->id }}</td> 
                       <td><img src="{{ asset($all_item->img_path) }}"height="50px"width="50px"></td>
                       <td>{{ $all_item->product_name }}</td>
                       <td>{{ $all_item->price }}</td>
                       <td>{{ $all_item->stock }}</td>
                       <td>{{ $all_item->company_id }}</td>
                       <td>                            
                            <form action="{{ route('item.search')}}">
                                @csrf
                                <input name="btnSearchId" value="{{ $all_item->id }}" type="hidden">
                                <input type="submit" value="詳細">
                            </form>
                        </td>
                       <td>
                            <form action="{{ route('item.del')}}" method="POST">
                                @csrf
                                <input name="btnDelId" value="{{ $all_item->id }}" type="hidden">
                                <input type="submit" value="削除" onClick="return confirm('本当に削除しますか?');">
                            </form>
                        </td>
                     </tr>
                     @endforeach
                    </table>
                    <script src="{{ asset('js/SearchItem.js') }}"></script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
