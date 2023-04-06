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
                       <td>サンプル1</td>
                       <td>サンプル2</td>
                       <td>サンプル3</td>
                       <td>サンプル4</td>
                       <td>サンプル5</td>
                       <td>サンプル6</td>
                       <td>サンプル7</td>
                     </tr>
                    </table>
                   <a href="{{ url('/home') }}"> 戻る </a>
                    <a href="{{ url('/edit') }}"> 編集 </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
