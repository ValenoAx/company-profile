<!Doctype html>
<html>

{{-- Head --}}
@include('admin_web_visitor.partials.head')
{{-- Head --}}

<body>
    <!-- Header -->
    @include('admin_web_visitor.components.navbar')
    <!-- Header -->


    <!-- Mobile menu -->


    {{-- Main --}}
    @yield('content')
    {{-- Main --}}

    <!-- Footer -->
    @include('admin_web_visitor.components.footer')
    <!-- Footer -->


    {{-- script --}}
    @include('admin_web_visitor.partials.script')
    {{-- script --}}

</body>
</html>
