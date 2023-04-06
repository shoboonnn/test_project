@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <p>item_new</p>
                   <table>
                     <tr>
                        <th>商品名</th>
                        <th>メーカー</th>
                        <th>価格</th>
                        <th>在庫数</th>
                        <th>コメント</th>
                        <th>商品画像</th>
                     </tr>
                     <tr>
                       <td>
                            <input type="text">
                        </td>
                       <td>
                            <select name="example">
                                <option value="サンプル1">サンプル1</option>
                                <option value="サンプル2">サンプル2</option>
                                <option value="サンプル3">サンプル3</option>
                            </select>
                        </td>
                       <td>
                        <input type="number">
                        </td>
                       <td><input type="nunmer"></td>
                       <td><input type="textarea"></td>
                       <td><input type="file"></td>
                     </tr>
                    </table>              
                    <input type="submit" value="登録">
                   <a href="{{ url('/home') }}"> 戻る </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
