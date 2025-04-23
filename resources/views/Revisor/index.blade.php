<x-layout>
    <x-button />
    @if (session()->has('message'))
        <div class="row justify-content-center">
            <div class="col-5 alert alert-success text-center shadow rounded">
                {{ session('message') }}
            </div>
        </div>
    @endif
    <div class="container-fluid mb-5">
        <div class="row">
            <div class="col-12">
                <div class="revisor-title">
                    <h1 class="display-5 text-center p-2">
                        {{ __('ui.dashboard') }}
                    </h1>
                </div>
            </div>
        </div>

        <div class="accordion accordion-flush pt-5" id="accordionFlushExample">
            @foreach ($articles_to_check as $index => $article)
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed acc-button border-1" type="button"
                            data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $index }}"
                            aria-expanded="false" aria-controls="flush-collapse{{ $index }}">
                            {{ __('ui.ad') }} #{{ $index + 1 }}: {{ $article->title }}
                        </button>
                    </h2>
                    <div id="flush-collapse{{ $index }}" class="accordion-collapse collapse"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                    <div class="row justify-content-center">
                                        @if ($article->images->count())
                                            @foreach ($article->images as $key => $image)
                                            <div class="col-12 col-md-6 mb-4">
                                                <!-- CARD 1: IMMAGINE -->
                                                <div class="card mb-3 shadow-sm">
                                                    <div class="card-body text-center">
                                                        <img src="{{ $image->getUrl(300, 300) }}"
                                                            style="width: 100%; max-width: 300px; height: auto; object-fit: cover;"
                                                            class="img-fluid rounded"
                                                            alt="Immagine {{ $key + 1 }} dell’articolo '{{ $article->title }}'">
                                                    </div>
                                                </div>
                                            
                                                <!-- CARD 2: LABELS -->
                                                <div class="card mb-3 shadow-sm">
                                                    <div class="card-body">
                                                        <h5>Labels</h5>
                                                        @if ($image->labels)
                                                            <ul class="list-inline">
                                                                @foreach ($image->labels as $label)
                                                                    <li class="list-inline-item badge bg-secondary">{{ $label }}</li>
                                                                @endforeach
                                                            </ul>
                                                        @else
                                                            <p class="fst-italic">No labels</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            
                                                <!-- CARD 3: RATINGS -->
                                                <div class="card shadow-sm">
                                                    <div class="card-body">
                                                        <h5>Ratings</h5>
                                                        <div class="d-flex flex-column gap-2">
                                                            <div>
                                                                <span class="{{ $image->adult }}">{{ $image->adult }}</span> <span>adult</span>
                                                            </div>
                                                            <div>
                                                                <span class="{{ $image->violence }}">{{ $image->violence }}</span> <span>violence</span>
                                                            </div>
                                                            <div>
                                                                <span class="{{ $image->spoof }}">{{ $image->spoof }}</span> <span>spoof</span>
                                                            </div>
                                                            <div>
                                                                <span class="{{ $image->racy }}">{{ $image->racy }}</span> <span>racy</span>
                                                            </div>
                                                            <div>
                                                                <span class="{{ $image->medical }}">{{ $image->medical }}</span> <span>medical</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @endforeach
                                        @else
                                            @for ($i = 0; $i < 6; $i++)
                                                <div class="col-6 col-md-4 mb-4 text-center">
                                                    <img src="https://picsum.photos/300" alt="immagine segnaposto"
                                                        class="img-fluid rounded shadow">
                                                </div>
                                            @endfor
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4 ps-4 d-flex flex-column justify-content-between">
                                    <div>
                                        <h1>{{ $article->title }}</h1>
                                        <h3>{{ __('ui.author') }}: {{ $article->user->name }}</h3>
                                        <h4 class="fst-italic text-muted"># {{ __('ui.' . $article->category->name) }}
                                        </h4>
                                        <p class="h6"> {{ $article->description }} </p>
                                    </div>

                                    <div class="d-flex pb-4 justify-content-around div-rev-button">
                                        <form action="{{ route('reject', ['article' => $article]) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-danger py-2 px-5">{{ __('ui.reject') }}</button>
                                        </form>
                                        <form action="{{ route('accept', ['article' => $article]) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-success py-2 px-5">{{ __('ui.accept') }}</button>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
<x-footer />
