@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <p>item_search</p>
                   <a href="{{ url('/home') }}"> 戻る </a>
                    <a href="{{ url('/edit') }}"> 編集 </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
