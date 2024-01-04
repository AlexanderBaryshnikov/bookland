<div class="book-detail">
    <ul class="book-info">
        <li>
            <div class="writer-info">
                <img src="images/profile2.jpg" alt="book">
                @if($product->author->name)
                    <div>
                        <span>Автор: </span>{{ $product->author->name }}
                    </div>
                @endif
            </div>
        </li>
        @if($product->publisher->name)
            <li><span>Издательство: </span>{{ $product->publisher->name }}</li>
        @endif
        @if($product->year)
            <li><span>Год: </span>{{ $product->year }}</li>
        @endif

    </ul>
</div>
