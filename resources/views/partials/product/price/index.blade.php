<div class="price">
    <div class="price__current-value">{{ $product->price }}@include('partials.icons.rub.index')
    </div>
    @if($product->old_price)
        <div class="price__old-value p-lr10">{{ $product->old_price }}@include('partials.icons.rub.index')</div>
    @endif
</div>
