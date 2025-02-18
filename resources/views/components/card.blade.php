<div class="card-container-custom">
    <div class="card-article">
        <div class="image-container">
            <!-- Immagine dinamica -->
            <a href="{{ route(name: 'article.show', parameters: compact(var_name: 'article')) }}" class="hero-link">
                <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(300, 300) : 'https://picsum.photos/600/400?random=' . rand(1, 1000) }}"
                    alt="{{ $article->title }}" class="product-image">
            </a>
            <!-- Prezzo dinamico -->
            <div class="price">{{ $article->price }} EUR</div>
        </div>

        <label class="favorite">
            <input checked="" type="checkbox">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000">
                <path
                    d="M12 20a1 1 0 0 1-.437-.1C11.214 19.73 3 15.671 3 9a5 5 0 0 1 8.535-3.536l.465.465.465-.465A5 5 0 0 1 21 9c0 6.646-8.212 10.728-8.562 10.9A1 1 0 0 1 12 20z">
                </path>
            </svg>
        </label>

        <div class="content">
            <!-- Titolo dinamico -->
            <div class="brand mb-1">{{ $article->title }}</div>
            <!-- Descrizione dinamica -->
            <div class="product-name">{{ $article->description }}</div>

            <div class="color-size-container">
                <div class="sizes">
                    <ul class="size-container">
                </div>
            </div>
            <div class="pb-1">
                <a href="{{ route(name: 'byCategory', parameters: ['category' => $article->category]) }}">
                    <h6>
                        {{ __("ui." . strtolower($article->category->name)) }}
                    </h6>
                </a>
            </div>


            <!-- Data di creazione dinamica -->
            <div class="rating">
                <svg viewBox="0 0 99.498 16.286" xmlns="http://www.w3.org/2000/svg" class="svg four-star-svg">
                    <path fill="#fc0" transform="translate(-0.001 -1.047)"
                        d="M9.357,1.558,11.282,5.45a.919.919,0,0,0,.692.5l4.3.624a.916.916,0,0,1,.509,1.564l-3.115,3.029a.916.916,0,0,0-.264.812l.735,4.278a.919.919,0,0,1-1.334.967l-3.85-2.02a.922.922,0,0,0-.855,0l-3.85,2.02a.919.919,0,0,1-1.334-.967l.735-4.278a.916.916,0,0,0-.264-.812L.279,8.14A.916.916,0,0,1,.789,6.576l4.3-.624a.919.919,0,0,0,.692-.5L7.71,1.558A.92.92,0,0,1,9.357,1.558Z"
                        id="star-svgrepo-com"></path>
                    <path fill="#fc0" transform="translate(20.607 -1.047)"
                        d="M9.357,1.558,11.282,5.45a.919.919,0,0,0,.692.5l4.3.624a.916.916,0,0,1,.509,1.564l-3.115,3.029a.916.916,0,0,0-.264.812l.735,4.278a.919.919,0,0,1-1.334.967l-3.85-2.02a.922.922,0,0,0-.855,0l-3.85,2.02a.919.919,0,0,1-1.334-.967l.735-4.278a.916.916,0,0,0-.264-.812L.279,8.14A.916.916,0,0,1,.789,6.576l4.3-.624a.919.919,0,0,0,.692-.5L7.71,1.558A.92.92,0,0,1,9.357,1.558Z"
                        data-name="star-svgrepo-com" id="star-svgrepo-com-2"></path>
                    <path fill="#fc0" transform="translate(41.215 -1.047)"
                        d="M9.357,1.558,11.282,5.45a.919.919,0,0,0,.692.5l4.3.624a.916.916,0,0,1,.509,1.564l-3.115,3.029a.916.916,0,0,0-.264.812l.735,4.278a.919.919,0,0,1-1.334.967l-3.85-2.02a.922.922,0,0,0-.855,0l-3.85,2.02a.919.919,0,0,1-1.334-.967l.735-4.278a.916.916,0,0,0-.264-.812L.279,8.14A.916.916,0,0,1,.789,6.576l4.3-.624a.919.919,0,0,0,.692-.5L7.71,1.558A.92.92,0,0,1,9.357,1.558Z"
                        data-name="star-svgrepo-com" id="star-svgrepo-com-3"></path>
                    <path fill="#fc0" transform="translate(61.823 -1.047)"
                        d="M9.357,1.558,11.282,5.45a.919.919,0,0,0,.692.5l4.3.624a.916.916,0,0,1,.509,1.564l-3.115,3.029a.916.916,0,0,0-.264.812l.735,4.278a.919.919,0,0,1-1.334.967l-3.85-2.02a.922.922,0,0,0-.855,0l-3.85,2.02a.919.919,0,0,1-1.334-.967l.735-4.278a.916.916,0,0,0-.264-.812L.279,8.14A.916.916,0,0,1,.789,6.576l4.3-.624a.919.919,0,0,0,.692-.5L7.71,1.558A.92.92,0,0,1,9.357,1.558Z"
                        data-name="star-svgrepo-com" id="star-svgrepo-com-4"></path>
                    <path fill="#e9e9e9" transform="translate(82.431 -1.047)"
                        d="M9.357,1.558,11.282,5.45a.919.919,0,0,0,.692.5l4.3.624a.916.916,0,0,1,.509,1.564l-3.115,3.029a.916.916,0,0,0-.264.812l.735,4.278a.919.919,0,0,1-1.334.967l-3.85-2.02a.922.922,0,0,0-.855,0l-3.85,2.02a.919.919,0,0,1-1.334-.967l.735-4.278a.916.916,0,0,0-.264-.812L.279,8.14A.916.916,0,0,1,.789,6.576l4.3-.624a.919.919,0,0,0,.692-.5L7.71,1.558A.92.92,0,0,1,9.357,1.558Z"
                        data-name="star-svgrepo-com" id="star-svgrepo-com-5"></path>
                </svg>
                ({{ $article->created_at->diffForHumans() }})
            </div>
        </div>


        <!-- Pulsanti Azione -->
        <div class="  button-container">
            <a href="{{ route(name: 'article.show', parameters: compact(var_name: 'article')) }}" class="hero-link">
                <button class="buy-button button">{{ __('ui.inDetail') }}</button></a>

        </div>

        <div class="card-attribute mt-2">
            <img src="https://picsum.photos/300" alt="avatar" class="small-avatar" />
            <h6>{{ __('ui.adPostedBy') }} {{ $article->user->name }}</h6>
        </div>

    </div>
</div>
