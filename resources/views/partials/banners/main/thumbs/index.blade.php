<div class="swiper main-swiper-thumb">
    <div class="swiper-wrapper">
        @foreach($banners as $banner)
            @include('partials.banners.main.thumbs.slide.index')
        @endforeach
    </div>
</div>
