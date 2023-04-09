@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <p>item_edit</p>
                   @if (session('message'))
                        <div class="message">
                            {{ session('message') }}
                        </div>
                    @endif
                <form action="{{ route('Item.edit')}}" method="POST">
                @csrf
                    <table>
                        <tr>
                            <th>商品名ID</th>
                            <th>商品名</th>
                            <th>メーカー</th>
                            <th>価格</th>
                            <th>在庫数</th>
                            <th>コメント</th>
                            <th>商品画像</th>
                        </tr>
                        <tr>
                            <td>
                                {{ $edit->id }}
                            </td>
                            <td>
                                <input type="text" name="product_name" value="{{ $edit->product_name }}">
                            </td>
                            <td>
                                <select name="company_id">
                                <option value="{{ $edit->company_id }}">{{ $edit->company_id }}</option>
                                /* @foreach($edits->unique('company_id') as $edit)
                                    <option value="{{ $edit->company_id }}">{{ $edit->company_id }}</option>
                                @endforeach*/
                                </select>
                            </td>
                            <td>
                                <input type="number" name="price" value="{{ $edit->price }}">
                            </td>
                            <td>
                                <input type="nunber" name="stock" value="{{ $edit->stock }}">
                            </td>
                            <td>
                                <input type="textarea" name="comment" value="{{ $edit->comment }}">
                            </td>
                            <td>
                                <input type="file" name="img_path" value="{{ $edit->img_path }}">
                            </td>
                            </tr>
                        </table> 
                        <input name="editId" value="{{ $edit->id }}" type="hidden">
                        <input type="submit" value="更新" >
                    </form>
                   <form action="{{ route('Item.search')}}">
                        @csrf
                        <input name="searchId" value="{{ $edit->id }}" type="hidden">
                        <input type="submit" value="戻る" >
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
