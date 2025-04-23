<nav class="navbar navbar-expand-lg mb-5">
  <div class="container-fluid">
    <a class="navbar-brand" href="/"><img src="/media/logo.jpg" alt="logo" width="40px" class="ms-3"></a>
    <button class="navbar-toggler" style="margin-inline-end: 0px" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <div class="mx-auto navlink">
        <ul class="navbar-nav text-center ms-lg-5">
          <li><a href="{{ route('article.index') }}" class="nav-link mx-4">{{__('ui.ads')}}</a></li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle mx-4" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('ui.categories')}}</a>
            <ul class="dropdown-menu">
              @foreach ($categories as $category)
                <li><a href="{{ route('byCategory', ['name' => $category->name]) }}" class="dropdown-item py-2">{{ __("ui." . $category->name) }}</a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="{{ route('contact') }}" class="nav-link mx-4">{{__('ui.contact')}}</a></li>
        </ul>
      </div>
      <!-- Sezione lingue modificata -->
      <div class="d-flex flex-row justify-content-center justify-content-lg-end align-items-center language mb-3 mb-lg-0 ms-sm-3">
        <x-_locale lang="it" class="mx-1" />
        <x-_locale lang="en" class="mx-1" />
        <x-_locale lang="fr" class="mx-1" />
    </div>
      

      <div class="d-flex justify-content-center mb-2 mb-lg-0">
        @auth
          <a href="{{ route('create.article') }}" class="btn btn-outline-primary me-2">{{__('ui.ad_create')}}</a>
          <a href="{{ route('paymentStory') }}" class="btn btn-outline-primary me-2">Cronologia Acquisti</a>
          <form action="/logout" method="POST" class="mb-0">
            @csrf
            <button type="submit" class="btn btn-outline-primary me-2">{{__('ui.logout')}}</button>
          </form>
        @else
          <a href="{{ route('login') }}" class="nav-link pt-1 me-3 ms-3">{{__('ui.login')}}</a>
          <a href="{{route('article.index')}}" class="btn btn-outline-primary me-2">{{__('ui.buy')}}</a>

        @endauth
      </div>
    </div>
  </div>
</nav>