<x-layout>
    <x-button/>
    <div class="container-fluid">
        <div class="row pb-4 justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="fs-1">{{ __('ui.allArticles') }}</h1>
            </div>
        </div>
        
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 row-index">
            @forelse ($articles as $article)
                <div class="col col-index">
                    <x-card :article="$article" />
                </div>
            @empty
            <div class="col-12 d-flex justify-content-center w-100">
                <div class="text-center">
                    <h3 class="my-4 nowrap">{{ __('ui.no_ads') }}</h3>
                </div>
            </div>
            @endforelse
        </div>
    </div>
    
    @if($articles->isNotEmpty())
    <div class="container-fluid">
        <div class="row nav-pages">
            <nav aria-label="Navigazione tra le pagine">
                <ul class="pagination pagination-lg d-flex justify-content-center">
                    {!! $articles->links() !!}
                </ul>
            </nav>
        </div>
    </div>
    @endif
</x-layout>
<x-footer />