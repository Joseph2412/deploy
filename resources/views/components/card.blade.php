<div>
  <div class="card mx-auto card-ann mb-4">
      <img src=" {{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/200' }} " 
        class="card-img-top rounded-bottom img-ann" alt="Immagine dell'articolo {{$article->title}}">
      <div class="card-body card-b-ann">
        <p class="category-ann">{{ __("ui." . $article->category->name) }}</p>
        <div class="title-container d-flex">
          <h5 class="card-title fs-5 fw-medium title-ann">{{$article->title}}</h5>
        </div>
        <div class="price-container d-flex">
          <h5 class="card-subtitle fs-5 fw-light price-ann">{{$article->price}} €</h5>
        </div>
        {{-- <a href="{{route('byCategory', [$article->category->id])}}" class="text-decoration-none text-black">Categoria: {{$article->category->name}}</a> --}}
        <div class="card-body card-b-ann text-end">
          <a href="{{route('article.show', compact('article'))}}" class="text-black anchor-ann">{{__('ui.explore')}}</a>
      </div>
          
      </div>
    </div>
</div>
