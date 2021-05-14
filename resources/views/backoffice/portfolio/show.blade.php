@extends('layout.app')

@section('content')
    @include('partial.nav')
        
    <section class="container mr-5">
        
        <h1 class="text-center my-3">tableau de Photo</h1>
        <img class="w-75" src="{{ asset("img/" . $photo->lien) }}" alt="">
        
    </section>

    @include('partial.footer')
@endsection