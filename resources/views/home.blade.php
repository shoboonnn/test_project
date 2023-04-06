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
                        <option value="サンプル1">サンプル1</option>
                        <option value="サンプル2">サンプル2</option>
                        <option value="サンプル3">サンプル3</option>
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
                     <tr>
                       <td>サンプル1</td>
                       <td>サンプル2</td>
                       <td>サンプル3</td>
                       <td>サンプル4</td>
                       <td>サンプル5</td>
                       <td>サンプル6</td>
                     </tr>
                    </table>
                    <a href="{{ url('/search') }}"> 詳細 </a>                    
                    <input type="submit" value="削除">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
