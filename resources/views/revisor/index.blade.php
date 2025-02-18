<x-layout>
    <div class="container my-5">
        @if (session()->has('message'))
            <div class="alert alert-success text-center">
                {{ session('message') }}
            </div>
        @endif
        <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
            @if ($article_to_check)
                <div class="row g-0">
                    <!-- Sezione Immagini -->
                    <div class="col-md-8 p-3 justify-content-center text-center bg-dark">
                        <div class="row g-3">
                            @forelse ($article_to_check->images as $key => $image)
                                <!-- Mostra immagini se presenti -->
                                <div class="col-12 text-light mb-4">
                                    <h5>Labels</h5>
                                    @foreach ($image->labels as $label)
                                        #{{ $label }}
                                    @endforeach
                                
                                    <div class="row align-items-center">
                                        <!-- Colonna con l'immagine -->
                                        <div class="col-lg-6 col-md-6 col-12 d-flex justify-content-center mb-3 mb-md-0">
                                            <img src="{{ $image->getUrl(300, 300) }}"
                                                alt="Immagine {{ $key + 1 }} dell'articolo '{{ $article_to_check->title }}"
                                                class="img-fluid shadow-sm mt-3">
                                        </div>
                                
                                        <!-- Colonna con i dettagli -->
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="row ratings-query">
                                                <div class="d-flex flex-column ms-5">
                                                    <h5 class="col-4 text-end ms-4">Ratings</h5>
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <div class="col-4 text-end ratings-query">Adult:</div> 
                                                        <div class="ms-3 "><i class="{{ $image->adult }}"></i></div>
                                                    </div>
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <div class="col-4 text-end ratings-query">Violence:</div> 
                                                        <div class="ms-3"><i class="{{ $image->violence }}"></i></div>
                                                    </div>
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <div class="col-4 text-end ratings-query">Spoof:</div> 
                                                        <div class="ms-3"><i class="{{ $image->spoof }}"></i></div>
                                                    </div>
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <div class="col-4 text-end ratings-query">Racist:</div>
                                                        <div class="ms-3"><i class="{{ $image->racy }}"></i></div>
                                                    </div>
                                                    <div class="mb-2 d-flex align-items-center">
                                                        <div class="col-4 text-end ratings-query">Medical:</div> 
                                                        <div class="ms-3"><i class="{{ $image->medical }}"></i></div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            @empty
                                <!-- Mostra immagini segnaposto se non ci sono immagini -->
                                @for ($i = 0; $i < 6; $i++)
                                    <div class="col-6 col-md-4">
                                        <img src="https://picsum.photos/200/300" alt="Immagine segnaposto"
                                            class="img-fluid rounded-3 shadow-sm">
                                    </div>
                                @endfor
                            @endforelse
                        </div>
                    </div>
                    <!-- Sezione Dettagli -->
                    <div class="col-md-4 bg-light d-flex flex-column justify-content-between p-4">
                        <div>
                            <h2 class="fw-bold text-dark">{{ $article_to_check->title }}</h2>
                            <h5 class="text-muted">{{ __('ui.author') }}:
                                <span class="fw-semibold text-dark">
                                    {{ $article_to_check->user->name ?? 'Autore non disponibile' }}
                                </span>
                            </h5>
                            <h4 class="my-2 text-success fw-bold">
                                {{ $article_to_check->price ?? 'Prezzo non disponibile' }}€
                            </h4>
                            <p class="fst-italic text-secondary">
                                #{{ $article_to_check->category->name ?? 'Categoria non disponibile' }}
                            </p>
                            <p class="mt-3">
                                {{ $article_to_check->description ?? 'Descrizione non disponibile' }}
                            </p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-outline-danger fw-bold px-4 py-2">{{ __('ui.reject') }}</button>
                            </form>
                            <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-success fw-bold px-4 py-2">{{ __('ui.accept') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
        </div>
    @else
        <!-- Messaggio quando non ci sono articoli -->
        <div class="text-center py-5">
            <h2 class="text-success">{{ __('ui.noArticleToBeRevised') }}</h2>
            <a href="{{ route('homepage') }}" class="btn btn-primary mt-3">{{ __('ui.backToTheHomepage') }}</a>
        </div>
        @endif
    </div>



</x-layout>
