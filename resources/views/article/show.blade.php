<x-layout>

    <div class="container mt-5 bg-show-custom-container">
        <div class="row py-5 justify-content-center align-items-center text-center">
            <div class="col-12 col-md-6">
                <div class="container my-5">
                    <div class=" card-show-img">
                        <div class="row justify-content-center">
                            <div class="col-12 col-6">
                                @if ($article->images->count() > 0)
                                    <div id="carouselExample" class="carousel slide py-4">
                                        <div class="carousel-inner">
                                            @foreach ($article->images as $key => $image)
                                                <div
                                                    class="carousel-item @if ($loop->first) active @endif">
                                                    <img src="{{ Storage::url($image->path) }}"
                                                        class="d-block w-100 rounded-top"
                                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}">
                                                </div>
                                            @endforeach
                                        </div>
                                        @if ($article->images->count() > 1)
                                            <button class="carousel-control-prev" type="button"
                                                data-bs-target="#carouselExample" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button"
                                                data-bs-target="#carouselExample" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        @endif
                                    </div>
                                @else
                                    <img src="https://picsum.photos/600/400" alt="Nessuna foto inserita dall'utente"
                                        class="d-block w-100 rounded-top">
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- sezione card dettaglio -->
            <div class="col-12 col-md-6 ">
                <div class="card-body text-center show-blade-card  ">
                    <h1 class="card-title fw-bold text-dark mb-3 ">{{ $article->title }}</h1>
                    <p class="card-text text-secondary">{{ $article->description }}</p>

                    <hr class="transparent-hr">
                    <h4 class="text-primary fw-bold mb-4">{{ __('ui.price') }}: € {{ $article->price }}</h4>
                    <hr class="transparent-hr">
                    <a href="{{ route('article.index') }}" class="btn btn-primary btn-lg mt-3">
                        <i class="fas fa-arrow-left"></i> {{ __('ui.backToTheArticleList') }}
                    </a>
                </div>
            </div>
        </div>
    </div>







</x-layout>
