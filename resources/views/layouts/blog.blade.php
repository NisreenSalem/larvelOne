<!doctype html>
<html class="no-js" lang="en">

@include('includes.head')

<body>


    @include('includes.header')
    @include('includes.topArea')
    @yield('content')
    @include('includes.footer')
    @include('includes.footerJS')

</body>

</html>
