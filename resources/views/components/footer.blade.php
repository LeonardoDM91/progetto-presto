<div>
    <footer
        class="text-center text-lg-start text-dark"
        style="background-color: #ECEFF1">




        <section class="">
            <div class="container text-center text-md-start mt-5">
                <div class="row mt-3">


                    <div class="text-center col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold">Brand</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px;" />
                        <img src="/media/gran_bazar.png" alt="logo gran bazar" class="logo-footer" />
                    </div>

                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold">{{ __('ui.products') }}</h6>
                        <hr
                            class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />

                        <p>
                            <a href="{{route('article.index')}}" class="text-dark">{{ __('ui.allTheProducts')}}</a>
                        </p>
                        <p>
                            <a href="{{route('create.article')}}" class="text-dark">{{ __('ui.sellRightNow') }}</a>
                        </p>
                    </div>



                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <h6 class="text-uppercase fw-bold">{{ __('ui.usefulLinks') }}</h6>
                        <hr
                            class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            <a href="{{route('login')}}" class="text-dark">Login</a>
                        </p>
                        <p>
                            @if (Auth::check() && !Auth::user()->is_revisor)
                            <a href="{{ route('become.revisor') }}" class="text-dark">{{ __('ui.becomeRevisor') }}</a>
                        @endif
                        </p>

                    </div>


                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <h6 class="text-uppercase fw-bold">{{ __('ui.contacts') }}</h6>
                        <hr
                            class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p><i class="fas fa-home mr-3"></i> Aulab, BA 70124, IT</p>
                        <p><i class="fas fa-envelope mr-3"></i> granbazar@info.com</p>

                    </div>
                </div>
            </div>
        </section>


        <!-- Copyright -->
        <div
            class="text-center p-3"
            style="background-color: rgba(0, 0, 0, 0.2)">
            © 2024 Copyright: GranBazar.it

        </div>
    </footer>
</div>