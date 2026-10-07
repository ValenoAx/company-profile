<!DOCTYPE html>
<html lang="en">

{{-- Head --}}
@include('admin.partials.head')
{{-- Head --}}

<body>

 {{-- sidebar --}}
 @include('admin.components.sidebar')
 {{-- sidebar --}}


  <!-- ==========================================
         START: Main Content Area
         ========================================== -->
  <div class="main-wrapper">

    <!-- START: Top Navbar Component -->
    @include('admin.components.navbar')
    <!-- END: Top Navbar Component -->

    {{-- Main Content --}}
    @yield('content')

    <!-- START: Footer Component -->
    @include('admin.components.footer')
    <!-- END: Footer Component -->

  </div>
  <!-- ==========================================
         END: Main Content Area
         ========================================== -->

         {{-- script --}}
         @include('admin.partials.script')
         {{-- script --}}

</body>

</html>
