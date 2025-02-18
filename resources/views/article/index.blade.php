<x-layout>

<div class="create-background " style="
    background-image: url('../../media/background-5.jpg'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    width: 100%;">
    <div class="container-fluid">

        <div class="row height-custom text-center justify-content-center align-items-center py-5">
            <div class="col-12">
                <h1 class="display-1 category-text">{{ __('ui.allTheArticles') }}</h1>
            </div>
        </div>


        <div class="row height-custom justify-content-center align-items-center py-5">

            @forelse ($articles as $article)
                <div class="col-12 col-md-3">
                    <x-card :article="$article" />
                </div>
            @empty
                <div class="col-12">
                    <h3 class="text-center">
                        {{ __('ui.thereAreNoArticlesYet') }}
                    </h3>
                </div>
            @endforelse
        </div>
        <div class="d-flex justify-content-center">
        <div>
            {{ $articles->links() }}
        </div>
    </div>
    </div>
    
    </div>


     <!-- Pulsante "Torna su" con icona razzo -->
     <button id="scrollToTopBtn" class="scroll-to-top">
        <i class="fas fa-rocket"></i>
    </button>

</x-layout>
