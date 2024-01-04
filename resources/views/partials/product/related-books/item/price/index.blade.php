<div class="price">
    <span class="price-num">{{ $product->price }}@include('partials.icons.rub.index')</span>
    @if (!empty($product->old_price))
        <del>{{ $product->old_price }}@include('partials.icons.rub.index')</del>
    @endif
</div>
