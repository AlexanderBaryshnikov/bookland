<div class="swiper-slide bg-blue" style="background-image: url(images/background/waveelement.png);">
    <div class="container">
        <div class="banner-content">
            <div class="row">
                <div class="col-md-6">
                    <div class="swiper-content">
                        <div class="content-info">
                            @if(!empty($banner->title))
                                <h6 class="sub-title" data-swiper-parallax="-10">{{ $banner->title }}</h6>
                            @endif
                            <h1 class="title mb-0" data-swiper-parallax="-20">{{ $banner->product->name ?? '' }}</h1>
                            @include('partials.banners.main.content.wrapper.slide.tags.index')
                            @if(!empty($banner->product->description))
                                <p class="text mb-0"
                                   data-swiper-parallax="-40">{{ \Illuminate\Support\Str::limit($banner->product->description, 300) }}</p>
                            @endif
                            @include('partials.banners.main.content.wrapper.slide.price.index')
                            @include('partials.banners.main.content.wrapper.slide.links.index')
                        </div>
                        @include('partials.banners.main.content.wrapper.slide.partners.index')
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner-media" data-swiper-parallax="-100">
                        <img src="images/banner/banner-media.png" alt="banner-media">
                    </div>
                    <img class="pattern" src="images/Group.png" data-swiper-parallax="-100" alt="dots">
                </div>
            </div>
        </div>
    </div>
</div>
