<div class="col-xl-12 col-lg-6">
    <div class="dz-shop-card style-5">
        <div class="dz-media">
            <img src="{{ $product->getImage() }}" alt="">
        </div>
        <div class="dz-content">
            <h5 class="subtitle">{{ $product->name }}</h5>
            @if($product->category)
                <ul class="dz-tags">
                    @foreach($product->categories as $category)
                        <li>{{ $category->name . $loop->last ? ',' : '' }}</li>
                    @endforeach
                </ul>
            @endif
            @include('partials.product.related-books.item.price.index')
            <x-button class="btn-outline-primary btn-sm btnhover2">
                <x-slot:image>
                    <i class="flaticon-shopping-cart-1 me-2"></i>
                </x-slot:image>
                Добавить в корзину
            </x-button>
        </div>
    </div>
</div>
