<x-layout :title="config('app.name')">
  <div class="container-fluid">
    <div class="row">
      {{-- AREA PERSONALE --}}
      <div class="col-lg-6 col-sm-12 personal-dash">
        @auth
          @if (Auth::user()->is_revisor)
          <div class="d-block d-lg-none text-center mb-3">
              <a href="{{ route('revisor.index') }}" class="position-relative btn btn-primary btn-rev">
                {{__('ui.btn_revisor')}}
                  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  {{ \App\Models\Article::toBeRevisedCount() }}
                 </span>
              </a>
            </div>
          @endif
        
        <h1>{{__('ui.hello')}}, {{ auth()->user()->name }}!</h1>
        <form action="{{ route('article.search') }}" method="GET" class="pt-3 d-flex justify-content-start">
          <div class="input-group mb-3 form-search">
            <input type="search" name="query" class="form-control inp-search" placeholder="{{__('ui.search_1')}}" aria-label="search">
            <button type="submit" class="input-group-text btn ms-2 btn-mobile">{{__('ui.search_2')}}</button>
          </div>
        </form>
      </div>
      @endauth

      {{-- AREA REVISORI / UTENTI NON REVISORI --}}
      <div class="col-lg-6 col-sm-12 ms-auto text-end mt-5">
        @auth
          @if (Auth::user()->is_revisor)
            <a class="btn btn-revisore position-relative me-5" href="{{ route('revisor.index') }}">
             {{__('ui.btn_revisor')}}
              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ \App\Models\Article::toBeRevisedCount() }}
              </span>
            </a>
          @else
            <!-- Contenuto per utenti loggati non revisori -->
            <div class="feature col personal-sale text-center me-auto">

              <h3 class="fs-4 text-body-emphasis">{{__('ui.sale.title.first')}}<br>{{__('ui.sale.title.last')}}</h3>
              <p class="">{{__('ui.sale.discount')}}</p>
              <a href="{{route('article.index')}}" class="icon-link call-to-action">
                {{__('ui.sale.discover')}}
              </a>
            </div>
          @endif
        @endauth
      </div>      
    </div>
  </div>
    @guest
    <div class="col-12 text-center div-guest">
      <h2>{{__('ui.welcome_1')}}</h2>
      <p class="mb-3 text-welcome fw-lighter">
        {{__('ui.welcome_2')}}
      </p>
      <form action="{{ route('article.search') }}" method="GET" class="pt-3 d-flex justify-content-center">
        <div class="input-group mb-5" style="max-width: 500px; width: 100%;">
          <input type="search" name="query" class="form-control inp-search" placeholder="{{__('ui.search_1')}}" aria-label="search">
          <button type="submit" class="input-group-text btn ms-2">{{__('ui.search_2')}}</button>
        </div>
      </form>
    </div>
  @endguest


     {{-- CATEGORIE --}}
     <div class="scroller-wrapper mt-3">
      <div class="scroller-track">
          @foreach ($categories as $category)
              <div class="card photo-container">
                  <a href="{{ route('byCategory', ['name' => $category->name]) }}" class="dropdown-item py-2 card-text">
                      <img src="{{ asset('/media/' . strtolower($category->name) . '.png') }}" 
                          class="card-img-top photo-box" 
                          alt="{{ __("ui." . $category->name) }}">
                  </a>
                  <div class="card-body">
                      <a href="{{ route('byCategory', ['name' => $category->name]) }}" class="dropdown-item py-2 card-text">
                          {{ __("ui." . $category->name) }}
                      </a>
                  </div>
              </div>
          @endforeach
          
          {{-- Duplicato per il loop infinito --}}
          @foreach ($categories as $category)
              <div class="card photo-container">
                  <a href="{{ route('byCategory', ['name' => $category->name]) }}" class="dropdown-item py-2 card-text">
                      <img src="{{ asset('/media/' . strtolower($category->name) . '.png') }}" 
                          class="card-img-top photo-box" 
                          alt=" {{ __("ui." . $category->name) }}">
                  </a>
                  <div class="card-body">
                      <a href="{{ route('byCategory', ['name' => $category->name]) }}" class="dropdown-item py-2 card-text">
                        {{ __("ui." . $category->name) }}
                      </a>
                  </div>
              </div>
          @endforeach
      </div>
    </div>

  
  
    {{-- ANNUNCI --}}
    <div class="container-fluid height-custom py-5 div-annunci">
      <div class="row pt-5 w-100">
        <div class="col-12">
          <h3 class="text-start">{{__('ui.recent')}}</h3>
        </div>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-2">
          @forelse ($articles as $article)
            <div class="col">
              <x-card :article="$article" />
            </div>
          @empty 
            <div class="col-12">
              <h3 class="text-center nowrap">{{__('ui.no_ads')}}</h3>
            </div>
          @endforelse
        </div>
      </div>
    </div>
    
    

  
      <div class="container-fluid div-scopri">
          <div class="col-12">
            <a href="{{ route('article.index') }}" class="text-black">
              <h4 class="fs-5 fw-light letter-spacing">{{__('ui.discover')}}</h4>
            </a>
          </div>
        </div>
      </div>


  

  
     {{-- COME FUNZIONA --}}
     @guest
     <div class="container-fluid container-description">
      <div class="row my-5">
        <div class="col-lg-6 col-sm-12">
          <h2>{{__('ui.function_1')}}</h2>
          <p class="mb-3 text-welcome fw-lighter text-container">{{__('ui.function_2')}}</p>

        </div>
        <div class="col-lg-6 col-sm-12">
          <div class="accordion accordion-flush" id="accordionFlushExample">
          
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed acc-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                  {{__('ui.sell')}}
                </button>
              </h2>
              <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">{{__('ui.first_accordion')}}</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed acc-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                  {{__('ui.buy')}}
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">{{__('ui.second_accordion')}}</div>
              </div>
            </div>
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed acc-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                  {{__('ui.trade')}}
                </button>
              </h2>
              <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">{{__('ui.third_accordion')}}</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     {{-- REVISORI --}}
     <div class="container-fluid full-width-section">
      <div class="row my-5 row-revisor py-5">
          <div class="col-lg-6 col-sm-12">
              <h2 class="ms-5">{{ __('ui.revisor.prefix') }} <em><br>{{ __('ui.revisor.emphasis') }}</em>{{ __('ui.revisor.suffix') }}
              </h2>
              <a href="{{ route('about.revisor') }} " class="btn ms-5 px-5 mt-3 mb-sm-3">{{__('ui.apply')}}</a>
          </div>
          <div class="col-lg-6 col-sm-12 div-revisori">
              <p class="ms-5 fw-light">
                  {{__('ui.revisor_2')}}
              </p>
          </div>
      </div>
  </div>
  @endguest
  
    @if (session()->has('errorMessage'))
      <div class="alert alert-danger text-center shadow rounded w-50">
        {{ session('errorMessage') }}
      </div>
    @endif
  </x-layout>
  <x-footer />