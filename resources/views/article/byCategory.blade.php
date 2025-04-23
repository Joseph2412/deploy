<x-layout> 
    <x-button/>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center text-center mb-5">
            <div class="col-12">
                <h1 class="fs-1">{{ __('ui.allAds') }} <span class="fst-italic fw-bold">{{ __( "ui.$category->name" )}}</span></h1>
            </div>
        </div>
        
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 d-flex justify-content-center row-index">
            @forelse ($articles as $article)
            <div class="col">
                <x-card :article="$article" />
            </div>
            @empty
            <div class="row justify-content-center w-100"> <!-- Aggiunto un wrapper row con justify-content-center -->
                <div class="col-12 text-center"> <!-- Colonna centrata -->
                    <h3 class="my-3">{{__('ui.no_ads_category')}}</h3>
                    
                    @auth
                    <div class="d-flex justify-content-center mt-3">
                        <a href="{{route('create.article')}}" class="btn my-5 d-inline-block">{{__('ui.publish')}}</a>
                    </div>
                    @endauth
                </div>
            </div>
            @endforelse
        </div>
    </div>
</x-layout>
<x-footer />