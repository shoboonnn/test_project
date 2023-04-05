@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                   <p>item_edit</p>
                   <a href="{{ url('/search') }}"> 戻る </a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
