
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
    <div class="col-md-3 mb-2 mb-md-0">
        <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
            <img src="/media/logo.png" alt="logo" width="64px" class="ms-3">
        </a>
    </div>

    <ul class="nav col-12 col-md-auto justify-content-center mb-md-0 align-items-center">
        <li><a href="{{ route('article.index') }}" class="nav-link mx-4">Annunci</a></li>
        <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle mx-4" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
            <ul class="dropdown-menu">
                @foreach ($categories as $category)
                    <li><a href="{{ route('byCategory', ['name' => $category->name]) }}" class="dropdown-item py-2">{{ $category->name }}</a></li>
                    @if (!$loop->last)
                    @endif
                @endforeach
            </ul>
        </li>
        <li><a href="#" class="nav-link mx-4">Contatti</a></li>
        
        {{-- Sezione Bandiere Cambio Lingua Pagina --}}
        {{-- Catalina, muovi questo codice dove meglio appare nella vista ma in NAVBAR --}}

        {{-- Bandiera Italiana --}}
        <x-_locale lang="it" />
        
        {{-- Bandiera Inglese --}}
        <x-_locale lang="en" />
        
        {{-- Bandiera Francese --}}
        <x-_locale lang="fr" />
    </ul>

    
    {{-- utente loggato --}}

    
    @auth
        <div class="col-md-3 text-end">
            <a href="{{ route('create.article') }}" class="btn btn-outline-primary me-2 ">Crea annuncio</a>
            <form action="/logout" method="POST" class="btn btn-outline-primary me-4 mb-0">
                @csrf
                <button type="submit" class="text-white">Logout</button>
            </form>
        </div>
    {{-- utente non loggato --}}
    @else
    <div class="col-md-3 d-flex justify-content-end align-items-center">
        <a href="{{ route('login') }}" class="nav-link px-3">Login</a>
        <a href="" class="btn btn-outline-primary me-4 weight">Compra</a>
    </div>
    @endauth

   

</header>

{{-- TOGGLER MENU --}}

{{-- <header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4">
  
    
    <nav class="navbar fixed-top">
        <div class="container-fluid">
          
            
            <div class="col-3 col-md-3 mb-2 mb-md-0 order-md-first">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img src="/media/logo.png" alt="logo" width="64px" class="ms-3">
                </a>
            </div>

           
            
            <button class="navbar-toggler d-md-none order-md-last" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            
            
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Navigazione</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                       
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('article.index') }}">Annunci</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categorie</a>
                            <ul class="dropdown-menu">
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('byCategory', ['category' => $category]) }}" class="dropdown-item py-2">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contatti</a>
                        </li>

                        
                        @auth
                            <li class="nav-item">
                                <a href="{{ route('create.article') }}" class="btn btn-outline-primary">Crea annuncio</a>
                            </li>
                            <li class="nav-item">
                                <form action="/logout" method="POST" class="btn btn-outline-primary">
                                    @csrf
                                    <button type="submit" class="text-white">Logout</button>
                                </form>
                            </li>
                        
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Login</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('article.index') }}" class="btn btn-outline-primary">Compra</a>
                            </li>
                        @endauth
                    </ul>
              
                </div>
            </div>
        </div>
    </nav>
</header> --}}
