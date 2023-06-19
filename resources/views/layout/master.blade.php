<!DOCTYPE html>
<html lang="en">
    @include('layout.component.head')
<body>
    <div class="wrapper">
    @include('layout.component.header')
    @include('layout.component.sidebar')
    <div class="content-wrapper">

    <section class="content"> @yield('content')</section>
    </div>
    @include('layout.component.footer')
    </div>
</body>
@include('layout.component.script')
@yield('scripts')
</html>