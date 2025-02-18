<x-layout>
    <div class="video-background">
        <video autoplay loop muted playsinline class="video-bg">
            <source src="/media/video_form.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="container-video pt-5">
        <div class="row justify-content-between align-items-center">
            <!-- Sezione di testo e immagine -->
            <div class="col-12 col-md-6 text-image-section">
                <div class="animated-content text-center">
                    <h2 class="text-light display-4 ms-5">{{ __('ui.welcomeToGranBazar') }}</h2>
                    <p class="text-light fs-3 ms-5">{{ __('ui.registerQuickly') }}</p>
                    <img src="/media/imageform.png" alt="Immagine di benvenuto" class="img-fluid rounded img-form">
                </div>
            </div>

            <!-- Modulo di registrazione -->
            <div class="col-12 col-md-6 mt-5">
                <form action="{{ route('register') }}" method="POST" class="register-form animated-form">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @csrf
                    <div class="mb-3 row">
                        <h3>Registrati</h3>
                        <div class="col-6">
                        <label for="name" class="form-label">{{ __('ui.name') }}:</label>
                        <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="col-6">
                        <label for="surname" class="form-label">{{ __('ui.surname') }}:</label>
                        <input type="text" class="form-control" name="surname" id="surname">
                        </div>
                    
                    
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Mail:</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" id="password">
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{ __('ui.confirmYourPassword') }}:</label>
                        <input type="password" class="form-control" name="password_confirmation"
                            id="password_confirmation">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-outline-light" type="submit">{{ __('ui.register') }}</button>
                    </div>
                    
                    <div class="d-flex justify-content-center">
                        <p>{{ __('ui.areYouAlreadySignIn') }}?</p> <a class="mx-2" href="{{route('login')}}">Login</a>
                    </div>
                    
                    <div class="corner-shape"></div>
                </form>
            </div>
        </div>
    </div>

     <!-- Pulsante "Torna su" con icona razzo -->
     <button id="scrollToTopBtn" class="scroll-to-top">
        <i class="fas fa-rocket"></i>
    </button>
</x-layout>
