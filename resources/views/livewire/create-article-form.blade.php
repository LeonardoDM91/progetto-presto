<form class=" shadow-custom rounded p-5 " wire:submit="save">

    {{-- feedback visivo di avvenuta creazione --}}

    @if (session()->has('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    

    <div class="mb-3">
        <label for="title" class="form-label">{{ __('ui.title') }}:</label>
        <input type="text"
            class="form-control  @error('title')
        is-invalid text-danger fst-italic
    @enderror" id="title"
            wire:model.blur="title">
        @error('title')
            <div class="text-danger fst-italic">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">{{ __('ui.description') }}:</label>
        <textarea id="description" cols="30" rows="10"
            class="form-control  @error('description')
        is-invalid text-danger fst-italic
    @enderror"
            wire:model.blur="description"></textarea>
        @error('description')
            <div class="text-danger fst-italic">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">{{ __('ui.price') }}:</label>
        <input type="text"
            class="form-control  @error('price')
        is-invalid text-danger fst-italic
    @enderror" id="price"
            wire:model.blur="price">
        @error('price')
            <div class="text-danger fst-italic">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <select id="category" wire:model.blur="category"
            class="form-control @error('category')
             is-invalid 
         @enderror">
            <option label>{{ __('ui.chooseACategory') }}</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        @error('category')
            <div class="text-danger fst-italic">{{ $message }}</div>
        @enderror
    </div>
    

    {{-- ! Caricare una collezzione di immagini per la creazione dell'articolo --}}
    <div class="mb-3">
        <label for="temporary_images" class="form-label">{{ __('ui.picture') }}</label>
        <input type="file"
            class="form-control  @error('temporary_images') is-invalid text-danger fst-italic @enderror
            @error('temporary_images.*') is-invalid text-danger fst-italic @enderror"
            id="temporary_images" wire:model="temporary_images" multiple>
        @error('temporary_images')
            <div class="text-danger fst-italic">{{ $message }}</div>
        @enderror
        @error('temporary_images.*')
            <div class="text-danger fst-italic">{{ $message }}</div>
        @enderror
    </div>

    @if (!empty($images))
        <div class="row">
            <div class="col-12">
                <p>{{ __('ui.preview') }}</p>
                <div class="row border py-4 d-flex flex-wrap justify-content-center">
                    @if (count($images) > 0)
                        @foreach ($images as $key => $image)
                        <div class="d-flex flex-column align-items-center mx-2 " style="width: 140px;">
                                <div class="col-12 d-flex flex-column align-items-center mx-2  ">
                                    <div style="position: relative; width: 150px; height: 150px; overflow: hidden;">
                                        <img src="{{ $image->temporaryUrl() }}"
                                            style="width: 100%; height: 100%; object-fit: cover;" class="shadow">
                                    </div>

                                    <button type="button" class="btn btn-danger btn-sm my-3"
                                        wire:click="removeImages({{ $key }})">[X]</button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p>{{ __('ui.noImagesLoaded') }}</p>
                    @endif

                </div>
            </div>
    @endif

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-danger">{{ __('ui.upload') }}</button>
    </div> 
</form>
