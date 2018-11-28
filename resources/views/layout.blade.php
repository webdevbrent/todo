<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.partials.head')
</head>
<body>
    
    <div class="container">
    @include('layout.partials.nav')    
        @yield('content')
    </div>
    @include('layout.partials.footer')
    @include('layout.partials.footer-scripts')
</body>
</html>