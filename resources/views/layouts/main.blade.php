<!DOCTYPE html>
<html lang="ru">
@include('partials.head.index')
<body>
<div class="page-wraper">
    @include('partials.header.index')
    @yield('content')
    @include('partials.footer.index')
    @include('partials.btn-top.index')
</div>
@include('partials.js.index')
</body>
</html>
