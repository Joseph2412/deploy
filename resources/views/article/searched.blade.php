<x-layout>
    <x-button />
<div class="container-fluid">
        <div class="row justify-content-center align-items-center text-center mb-5">
            <div class="col-12">
            <h1 class="fs-1">{{__('ui.allAds')}} "<span class="fst-italic">{{ $query }}</span>"
            </h1>
        </div>
    </div>
        <div class="row row-cols-2 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-6 d-flex justify-content-center row-index">
            @forelse ($articles as $article)
                <div class="col">
                    <x-card :article="$article" />
                </div>
           
            @empty  
                    <div class="col-12 text-center w-100">
                        <h3 class="text-center nowrap">{{__('ui.no_ads_search')}}</h3>
                    </div>
             
            @endforelse
        </div>
    </div>

    <div class="d-flex justify-content-center mt-5">
        <div>
            {{ $articles->links() }}
        </div>
    </div>

</x-layout>
<x-footer />