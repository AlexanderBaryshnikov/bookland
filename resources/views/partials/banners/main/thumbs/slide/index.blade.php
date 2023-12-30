<div class="swiper-slide">
    <div class="books-card">
        <div class="dz-media">
            {{-- TODO: add image --}}
            <img src="images/books/book16.png" alt="book">
        </div>
        <div class="dz-content">
            <h5 class="title mb-0">{{ $banner->product->name }}</h5>
            @if(!empty($banner->product->author))
                <div class="dz-meta">
                    {{ $banner->product->author->name }}
                </div>
            @endif
            <div class="book-footer">
                <div class="price">
                    <span class="price-num">{{ $banner->product->price }}</span>
                </div>
                <div class="rate">
                    <i class="flaticon-star text-yellow"></i>
                    <i class="flaticon-star text-yellow"></i>
                    <i class="flaticon-star text-yellow"></i>
                    <i class="flaticon-star text-yellow"></i>
                    <i class="flaticon-star text-yellow"></i>
                </div>
            </div>
        </div>
    </div>
</div>
