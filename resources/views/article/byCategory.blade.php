<x-layout>
    <div class="create-background "
        style="
    background-image: url('../../media/background-8.jpg'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    width: 100%;">


        <div class="container-fluid">
            <div class="row height-costum justify-content-center align-items-center py-5">
                <h1 class="category-text text-center">{{ __('ui.category') }}: {{ $category->name }}</h1>
                @forelse ($articles as $article)
                    <div class="col-12 col-md-3">
                        <x-cardCategory :article="$article" />
                        <div class="text-center">
                            <a href="{{ route('create.article') }}" class="button-29 small  mt-3" role="button">
                                {{ __('ui.publishAnArticle') }}
                            </a>
                        </div>

                    </div>
                @empty
                    <div class="col-12">
                        <h3 class="text-center">
                            {{ __('ui.thereAreNoArticlesForThisCategory') }}!
                        </h3>
                    </div>
                @endforelse
                @auth
                @endauth
            </div>
        </div>
    </div>


     <!-- Pulsante "Torna su" con icona razzo -->
     <button id="scrollToTopBtn" class="scroll-to-top">
        <i class="fas fa-rocket"></i>
    </button>
    
</x-layout>
