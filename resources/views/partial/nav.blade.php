<nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href={{ route('home') }}>Home</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                
                <li class="nav-item">
                    <a class="nav-link {{ $page === "user" ? "active" : "" }}" href={{ route('user') }}>User</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link {{ $page === "service" ? "active" : "" }}" href={{ route('service') }}>Service</a>
                </li>
                
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ $page === "photo" ? "active" : "" }}"  data-bs-toggle="dropdown" href={{ route('photo') }}>Photo</a>
                    <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-secondary" href={{ route('photo') }}>photo</a></li>

                        @foreach ($photos as $photo)
                            <li><a class="dropdown-item text-secondary" href="/photo/{{ $photo->id }}/show">{{ $photo->nom }}</a></li>
                        @endforeach
                        
                    </ul>
                </li> --}}
                
            </ul>
        </div>
    </div>
</nav>
