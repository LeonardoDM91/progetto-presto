<x-layout>
    <div class="video-background">
        <video autoplay loop muted playsinline class="video-bg">
            <source src="/media/video-login.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="container-video pt-5">





        <div class="container p-2 mt-5">
            <div class="row">
                <div class="col-12 co-md-6 ">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <form action="{{ route('login') }}" method="POST" class="custom-form-login category-text-create">
                        @csrf

                        <h3>{{ __('ui.doYouWantToAcces?IDontThinkSo') }}</h3>
                        <div class="mt-5 mb-3">
                            <label for="email" class="form-label">Mail:</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="mt-5 mb-5">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-outline-light" type="submit">Log in</button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <p>{{ __('ui.areYouANewUser') }}</p> <a class="mx-2" href="{{ route('register') }}">{{__('ui.signIn')}} </a>
                        </div>
                    </form>


                </div>
            </div>
        </div>

    </div>


 <!-- Pulsante "Torna su" con icona razzo -->
 <button id="scrollToTopBtn" class="scroll-to-top">
        <i class="fas fa-rocket"></i>
    </button>

</x-layout>
