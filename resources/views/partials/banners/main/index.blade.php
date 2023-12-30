@if($banners->count())
    <div class="main-slider style-1">
        @include('partials.banners.main.content.index')
        @include('partials.banners.main.thumbs.index')
    </div>
@endif
