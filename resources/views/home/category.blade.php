@extends('layouts.home.master')
@section('content')
<div class="themes-list">
    <div class="index-title login-box">
        <div class="container">
            <h1>{{$category->name}}</h1>
            <p class="desc">{{$category->description}}</p>
        </div>
    </div>
    <div class="container">
        @include('home.renders.product', ['list' => $products])
    </div>
</div>
@endsection