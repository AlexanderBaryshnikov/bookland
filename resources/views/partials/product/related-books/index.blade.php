@if(!empty($related_products))
    <h4 class="widget-title">Покупают вместе</h4>
    <div class="row">
        @foreach ($related_products as $product)
            @include('partials.product.related-books.item.index')
        @endforeach
    </div>
@endif
