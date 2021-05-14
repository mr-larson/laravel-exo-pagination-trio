@extends('layout.app')

@section('content')
  
    <section class="container">

        <h1 class="text-center my-3">Edit Photo</h1>

        <ul class="bg-danger rounded">
        
            @foreach ($errors->all() as $message)
                <li>{{ $message }}</li>
            @endforeach
            
        </ul>

        <form method="POST" action="/photo/{{ $photo->id }}/update">
            @csrf
            <div class="mb-3">
                <label  class="form-label">nom</label>
                <input type="text" class="form-control" value="{{ $photo->nom }}" name="nom">
            </div>
            <div class="mb-3">
                <label class="form-label">description</label>
                <textarea class="form-control" name="description" id="" cols="30" rows="10">{{ $photo->description }}</textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">lien</label>
                <input type="text" class="form-control" value="{{ $photo->lien }}" name="lien">
            </div>
            <button type="submit" class="btn btn-secondary text-white my-3">Submit</button>
        </form>
      
    </section>

  @include('partial.footer')
@endsection