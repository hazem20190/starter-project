<!DOCTYPE html>
<html lang="en">

@include('themes.partials.head')

<body>
    @include('themes.partials.header')

    @yield('content')

    @include('themes.partials.footer')

    @include('themes.partials.scripts')
</body>

</html>
