<div class="container-fluid">
    @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <form class="bg-body-tertiary p-5 my-5" wire:submit="save">
        <div class="mb-3">
            <label for="title" class="form-label">{{ __('ui.title') }}</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" wire:model.live="title">
            @error('title')
                <p class="fst-italic text-danger">{{ __('ui.error.title_required') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">{{ __('ui.description') }}</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror" wire:model.live="description"></textarea>
            @error('description')
                <p class="fst-italic text-danger">{{ __('ui.error.description_required') }}</p>
            @enderror
        </div>

        {{-- Inserimento immagini User Story 5 --}}
        <div class="mb-3">
            <input type="file" wire:model.live="temporary_images" multiple
                class="form-control @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">

            @error('temporary_images.*')
                <p class="fst-italic text-danger"> {{ __($message) }} </p>
            @enderror

            @error('temporary_images')
                <p class="fst-italic text-danger"> {{ __($message) }} </p>
            @enderror
        </div>

        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Photo preview</p>
                    <div class="row border-4 border-success rounded py-4">
                        @foreach ($images as $key => $image)
                            <div class="col d-flex flex-column align-items-center my-3">
                                <div class="img-preview mx-auto rounded"
                                    style="background-image: url({{ $image->temporaryUrl() }})">
                                </div>
                                <button type="button" class="btn mt-1 btn-danger" wire:click="removeImage({{$key}})">X</button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        {{-- Fine inserimento immagini --}}

        <div class="mb-3">
            <label for="price" class="form-label">{{ __('ui.price') }}</label>
            <div class="input-group">
                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" wire:model.blur="price">
                <span class="input-group-text">€</span>
            </div>
            @error('price')
                <p class="fst-italic text-danger">{{ __('ui.error.price_required') }}</p>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">{{ __('ui.category') }}</label>
            <select name="category" id="category" class="form-control @error('category') is-invalid @enderror" wire:model="category">
                <option value="" label active>{{ __('ui.select_category') }}</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <p class="fst-italic text-danger">{{ __('ui.error.category_required') }}</p>
            @enderror
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">{{ __('ui.ad_create') }}</button>
        </div>
    </form>
</div>
