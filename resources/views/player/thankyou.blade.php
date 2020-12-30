@extends('player.layouts.app')
@section('content')
@include('player.includes.sidebar')
@include('player.includes.header')
<div class="section__content section__content--p30">
    <div class="container-fluid">
        Thankyou
    </div>
</div>
@include('player.includes.footer')
@endsection

@push('scripts')
<script>
    // disable alphabets on input field
</script>
@endpush

