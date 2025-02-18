

    <x-layout>
    
      
    
    <div class="create-background " style="
    background-image: url('../../media/background-4.jpg'); 
    background-size: cover; 
    background-position: center; 
    background-repeat: no-repeat; 
    width: 100%;">
    <div class="container  ">
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <h1 class="category-text-create display-4 pt-5">{{ __('ui.postAnAd') }} </h1>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                <livewire:create-article-form />
            </div>
        </div>
    </div>
</div>


 <!-- Pulsante "Torna su" con icona razzo -->
 <button id="scrollToTopBtn" class="scroll-to-top">
        <i class="fas fa-rocket"></i>
    </button>
    
    
    </x-layout>

