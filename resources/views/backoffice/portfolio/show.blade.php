@extends('layout.app')

@section('content')
    @include('partial.nav')
        
    <section class="container mr-5">
        
        <h1 class="text-center my-3">tableau de Portfolio</h1>
        <img class="w-75" src="{{ asset("img/" . $portfolio->image) }}" alt="">
        
    </section>

    @include('partial.footer')
@endsection