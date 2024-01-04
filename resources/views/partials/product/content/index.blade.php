<div class="dz-content">
    <div class="dz-header">
        <h3 class="title">{{ $product->name }}</h3>
        <div class="shop-item-rating">
            @include('partials.product.content.rating.index')
            @include('partials.product.content.social.index')
        </div>
    </div>
    <div class="dz-body">
        @include('partials.product.content.details.index')
        @if($product->description)
            <div class="text-1">
                {!! $product->description !!}
            </div>
        @endif
        <div class="book-footer">
            @include('partials.product.price.index')
            <div class="product-num">
                <div class="quantity btn-quantity style-1 me-3">
                    <input id="demo_vertical2" type="text" value="1" name="demo_vertical2"/>
                </div>
                <x-button class="btn-primary btnhover2">
                    <x-slot:image>@include('partials.icons.cart.index')</x-slot:image>
                    <span class="m-l15">Добавить в корзину</span>
                </x-button>
                @include('partials.product.bookmark.index')
            </div>
        </div>
    </div>
</div>
