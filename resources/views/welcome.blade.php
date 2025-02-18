<x-layout>

    <!-- Contenitore Header -->


    <div class="d-flex justify-content-center align-items-center gran-bazar">

        <div class="text-center">

            <h1 class="display-1 text-1">GranBazar</h1>
            <h2 class="fs-3 text-2">{{__('ui.everythingYouNeed')}} </h2>
            
        </div>
    </div>
    <div class="text-center d-flex justify-content-center allert-bg">
        @if (session()->has('errorMessage'))
            <div class="alert alert-danger text-center shadow rounded w-50">
                {{ session('errorMessage') }}
            </div>
        @endif
        @if (session()->has('message'))
            <div class="alert alert-success text-center shadow rounded w-50">
                {{ session('message') }}
            </div>
        @endif
    </div>

    <div id="carouselExampleAutoplaying" class="carousel slide carousel-fade " data-bs-ride="carousel">
        <div class="carousel-inner ">
            <div class="carousel-item active ">
                <a href="{{ route('register') }}">
                    <img src="{{ asset('media/' . __('ui.img1')) }}" alt="Immagine 1">
                </a>
            </div>
            <div class="carousel-item">
                <a href="{{ route('article.index') }}">
                    <img src="{{ asset('media/' . __('ui.img2')) }}" alt="Immagine 2">
                </a>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('media/' . __('ui.img3')) }}" alt="Immagine 3">
            </div>
        </div>
    </div>

    <div class="text-center mt-5">
        <h3 class="mb-5">{{ __('ui.chooseACategory') }}:</h3>
        <div class="categories item">
            <div class="category" style="display: inline-block; margin: 10px; text-align: center;">
                <a href="http://127.0.0.1:8000/category/1">
                    <img class="img-cat" src="/media/elettronica.png" alt="Elettronica"
                        style="width: 250px; height: 150px; border-radius: 15px; transition: all 0.3s;"></a>
                <p class="mt-3">{{ __('ui.elettronica') }}</p>
            </div>
            <div class="category" style="display: inline-block; margin: 10px; text-align: center;">
                <a href="http://127.0.0.1:8000/category/2">
                    <img class="img-cat" src="/media/abbigliamento.png" alt="Abbigliamento"
                        style="width: 250px; height: 150px; border-radius: 15px; transition: all 0.3s;"></a>
                <p class="mt-3">{{ __('ui.abbigliamento') }}</p>
            </div>
            <div class="category" style="display: inline-block; margin: 10px; text-align: center;">
                <a href="http://127.0.0.1:8000/category/3">
                    <img class="img-cat" src="/media/salutebellezza.png" alt="Salute e Bellezza"
                        style="width: 250px; height: 150px; border-radius: 15px; transition: all 0.3s;"></a>
                <p class="mt-3">{{ __('ui.salute e bellezza') }}</p>
            </div>
            <div class="category" style="display: inline-block; margin: 10px; text-align: center;">
                <a href="http://127.0.0.1:8000/category/4">
                    <img class="img-cat" src="/media/casagiardinaggio.png" alt="Casa e Giardinaggio"
                        style="width: 250px; height: 150px; border-radius: 15px; transition: all 0.3s;"></a>
                <p class="mt-3">{{ __('ui.casa e giardinaggio') }}</p>
            </div>
            <div class="category" style="display: inline-block; margin: 10px; text-align: center;">
                <a href="http://127.0.0.1:8000/category/5">
                    <img class="img-cat" src="/media/giocattoli.png" alt="Giocattoli"
                        style="width: 250px; height: 150px; border-radius: 15px; transition: all 0.3s;"></a>
                <p class="mt-3">{{ __('ui.giocattoli') }}</p>
            </div>
        </div>
        <div class="categories item">
            <div class="category" style="display: inline-block; margin: 10px; text-align: center;">
                <a href="http://127.0.0.1:8000/category/6">
                    <img class="img-cat" src="/media/sport.png" alt="Elettronica"
                        style="width: 250px; height: 150px; border-radius: 15px; transition: all 0.3s;"></a>
                <p class="mt-3">{{ __('ui.sport') }}</p>
            </div>
            <div class="category" style="display: inline-block; margin: 10px; text-align: center;">
                <a href="http://127.0.0.1:8000/category/7">
                    <img class="img-cat" src="/media/animali.png" alt="Abbigliamento"
                        style="width: 250px; height: 150px; border-radius: 15px; transition: all 0.3s;"></a>
                <p class="mt-3">{{ __('ui.animali domestici') }}</p>
            </div>
            <div class="category" style="display: inline-block; margin: 10px; text-align: center;">
                <a href="http://127.0.0.1:8000/category/8">
                    <img class="img-cat" src="/media/libri.png" alt="Salute e Bellezza"
                        style="width: 250px; height: 150px; border-radius: 15px; transition: all 0.3s;"></a>
                <p class="mt-3">{{ __('ui.libri e riviste') }}</p>
            </div>
            <div class="category" style="display: inline-block; margin: 10px; text-align: center;">
                <a href="http://127.0.0.1:8000/category/9">
                    <img class="img-cat" src="/media/accessori.png" alt="Casa e Giardinaggio"
                        style="width: 250px; height: 150px; border-radius: 15px; transition: all 0.3s;"></a>
                <p class="mt-3">{{ __('ui.accessori') }}</p>
            </div>
            <div class="category" style="display: inline-block; margin: 10px; text-align: center;">
                <a href="http://127.0.0.1:8000/category/10">
                    <img class="img-cat" src="/media/motori.png" alt="Giocattoli"
                        style="width: 250px; height: 150px; border-radius: 15px; transition: all 0.3s;"></a>
                <p class="mt-3">{{ __('ui.motori') }}</p>
            </div>
        </div>
    </div>






    <div class="container mt-5" id="dynamic-section">
        <!-- Wrapper per layout -->
        <div class="row align-items-center ">
            <!-- Colonna di sinistra -->
            <div class="col-md-6 text-center content-left">
                <div class="d-flex justify-content-center">
                    <img src="/media/shopgirls.png" class="img-fluid rounded img-circle" alt="Image">
                </div>
                <h2 class="mt-3 mb-3 display-4">{{ __('ui.mostViewedAds') }}</h2>
            </div>

            <!-- Colonna di destra -->
            <div class="col-md-6 content-right">
                <div id="carouselExampleFade" class="carousel slide carousel-fade " data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/media/tv-samsung.png" class="d-block w-100 rounded" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/media/nikeairforce.png" class="d-block w-100 rounded" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/media/crocchette.png" class="d-block w-100 rounded" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="/media/moto.png" class="d-block w-100 rounded" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="text-center pt-5">
        <h1>{{ __('ui.lastAddedAds') }}</h1>
    </div>

    <div class="row height-costum justify-content-center-align-items-center py-5">

        @forelse ($articles as $article)
            <div class="col-12 col-md-3">

                <x-card :article="$article" />
            </div>

        @empty
            <div class="col-12">
                <h3 class="text-center">
                    {{ __('ui.noAdsAtTheMoment') }}
                </h3>
            </div>
        @endforelse
    </div>

    <!-- Pulsante "Torna su" con icona razzo -->
    <button id="scrollToTopBtn" class="scroll-to-top">
        <i class="fas fa-rocket"></i>
    </button>

</x-layout>
