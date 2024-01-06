<section class="content-inner-1">
    <div class="container">
        <div class="row book-grid-row style-4 m-b60">
            <div class="col">
                <div class="dz-box">
                    @include('partials.product.media.index')
                    @include('partials.product.content.index')
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8">
                @include('partials.product.tabs.index')
            </div>
            <div class="col-xl-4 mt-5 mt-xl-0">
                <div class="widget">
                    @include('partials.product.related-books.index')
                </div>
            </div>
        </div>
    </div>
</section>
@include('partials.forms.subscribe.index')

