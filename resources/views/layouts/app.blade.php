<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.meta')
    @include('includes.styles')
    @stack('styles')
</head>

<body>
    <div id="db-wrapper">
        <!-- navbar vertical -->
    @include('includes.actions.sweetalert-delete')
        @auth
            @include('includes.sidebar')

            <div id="page-content">

                @include('includes.header')
            @endauth

            {{ $slot }}

            @include('includes.footer')
        </div>
    </div>
    <!-- Scripts -->
    @include('includes.scripts')
    @stack('scripts')
</body>

</html>
