@extends('layouts.home.master')
@section('content')
<div class="themes-list w-100vh">
    <div class="container">
        @if(isset($contact) && $contact->count()) {!! $contact->description !!} @endif
    </div>
</div>
@endsection