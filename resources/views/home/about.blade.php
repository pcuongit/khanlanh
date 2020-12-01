@extends('layouts.home.master')
@section('content')
<div class="themes-list w-100vh">
    <div class="container">
        {!! $aboutme->description !!}
    </div>
</div>
@endsection