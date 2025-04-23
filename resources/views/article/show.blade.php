<x-layout :title="$article->title">
    <div class="container">

        {{-- ✅ Messaggio flash di successo --}}
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        <div class="row justify-content-center py-5">
            <!-- Colonna delle immagini -->
            <div class="col-lg-6 col-sm-12 mb-3 d-flex flex-column align-items-center">
                @if ($article->images->count() > 0)
                    <!-- Immagine principale -->
                    <img id="mainImage" src="{{ $article->images->first()->getUrl(300, 300) }}" class="d-block w-90 rounded mb-3" 
                        alt="Immagine principale dell'articolo {{ $article->title }}">
                    
                    <!-- Miniature sotto l'immagine principale -->
                    <div class="d-flex justify-content-center">
                        @foreach ($article->images as $image)
                            <img src="{{ $image->getUrl(300, 300) }}" class="thumb rounded me-2" alt="{{ $article->title }}" onclick="changeImage(this)">
                        @endforeach
                    </div>
                @else
                    <img id="mainImage" src="https://picsum.photos/400" class="d-block w-90 rounded mb-3" alt="Nessuna Foto inserita dall'utente">
                @endif
            </div>
  
            <!-- Colonna del titolo, prezzo e descrizione -->
            <div class="col-lg-6 col-sm-12 mb-3 text-start d-flex flex-column align-items-start col-description">
                <p class="fw-category py-2 category-ann fw-category">{{ __("ui." . $article->category->name) }}</p>
                <h1 class="display-4">{{$article->title}}</h1>
                <h4 class="mb-5">{{$article->price}}€</h4>
                <h5 class="fw-lighter">{{__('ui.description')}}: {{$article->description}}</h5>

                <form action="{{route('payment')}}" method="post" class="mt-5">


                {{-- ✅ Form pagamento con article_id --}}
                <form action="{{route('payment')}}" method="post">

                    @csrf
                    <input type="hidden" name="amount" value="{{$article->price}}">
                    <input type="hidden" name="article_id" value="{{ $article->id }}">
                    <button class="paypal-button text-white btn" type="submit">
                        <img src="/media/paypal-conto.png" alt="PayPal" class="paypal-logo mb-1" width="40px">
                        {{__('ui.pay')}}
                    </button>
                </form>
            </div>
        </div>
    </div>
  
    <div class="container-fluid height-custom d-flex flex-column align-items-center py-5 mb-5">
        <div class="row pt-5 d-flex flex-wrap justify-content-around w-100">
            <div class="col-12">
                <h3 class="text-start">{{__('ui.other')}}</h3>
            </div>

            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 row-cols-xxl-6 g-2 justify-content-around">
            @forelse ($articles as $article)

                <div class="col">
                    <x-card :article="$article" />
                 </div>
            @empty 
                <div class="col-12">
                    <h3 class="text-center">{{__('ui.no_ads')}}</h3>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
<x-footer />
