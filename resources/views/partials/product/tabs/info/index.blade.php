<div id="graphic-design-1" class="tab-pane show active">
    <table class="table border book-overview">
        <tr>
            <th>Название</th>
            <td>{{ $product->name ?? '' }}</td>
        </tr>
        @if($product->author->name)
            <tr>
                <th>Автор</th>
                <td>{{ $product->author->name }}</td>
            </tr>
        @endif
        @if($product->publisher->name)
            <tr>
                <th>Издательство</th>
                <td>{{ $product->publisher->name }}</td>
            </tr>
        @endif
        <tr>
            <th>ISBN</th>
            <td>{{ $product->isbn }}</td>
        </tr>
        @if(!empty($product->properties))
            @foreach($product->properties as $property)
                <tr>
                    <th>{{ $property->name ?? '' }}</th>
                    <td>{{ $property->pivot->value ?? '' }}</td>
                </tr>
            @endforeach
        @endif
        @if($product->categories)
            <tr class="tags">
                <th>Жанры</th>
                <td>
                    @foreach($product->categories as $category)
                        {{-- TODO: add link --}}
                        <a href="#" class="badge">{{ $category->name }}</a>
                    @endforeach
                </td>
            </tr>
        @endif

    </table>
</div>
