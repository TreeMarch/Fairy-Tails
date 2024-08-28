@extends('layouts/commonMaster')

@php
  /* Display elements */
  $contentNavbar = true;
  $containerNav = ($containerNav ?? 'container-xxl');
  $isNavbar = ($isNavbar ?? true);
  $isMenu = ($isMenu ?? true);
  $isFlex = ($isFlex ?? false);
  $isFooter = ($isFooter ?? true);

  /* HTML Classes */
  $navbarDetached = 'navbar-detached';

  /* Content classes */
  $container = ($container ?? 'container-xxl');

@endphp

@section('layoutContent')
  <div class="layout-wrapper layout-content-navbar {{ $isMenu ? '' : 'layout-without-menu' }}">
    <div class="layout-container">

      @if ($isMenu)
        @include('layouts/sections/menu/verticalMenu')
      @endif

      <!-- Layout page -->
      <div class="layout-page">
        <!-- BEGIN: Navbar-->
        @if ($isNavbar)
          @include('layouts/sections/navbar/navbar')
        @endif
        <!-- END: Navbar-->

        <!-- Content wrapper -->
        <div class="content-wrapper">

          <!-- Content -->
          @if ($isFlex)
            <div class="{{$container}} d-flex align-items-stretch flex-grow-1 p-0">
              @else
                <div class="{{$container}} flex-grow-1 container-p-y">
                  @endif

                  @yield('content')

                </div>
                <!-- / Content -->

                <!-- Footer -->
                @if ($isFooter)
                  @include('layouts/sections/footer/footer')
                @endif
                <!-- / Footer -->
                <div class="content-backdrop fade"></div>
            </div>
            <!--/ Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      @if ($isMenu)
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
      @endif
      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Loading element -->
    <div id="loading" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.7); z-index: 9999; text-align: center;">
      <img src="{{ asset('assets/img/LoadingAnimation.gif') }}" alt="Loading..." style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 100px;">
    </div>


    @endsection

    @section('scripts')
      <script>
        // Hiển thị loading khi trang được tải xong
        window.addEventListener('load', function () {
          document.getElementById('loading').style.display = 'none';
        });

        // Hiển thị loading khi bất kỳ form nào được submit
        document.addEventListener('DOMContentLoaded', function () {
          const form = document.querySelector('form');
          if (form) {
            form.addEventListener('submit', function () {
              document.getElementById('loading').style.display = 'block';
            });
          }

          // Hiển thị loading khi nhấp vào các liên kết hoặc nút
          document.querySelectorAll('a, button').forEach(function (element) {
            element.addEventListener('click', function () {
              document.getElementById('loading').style.display = 'block';
            });
          });
        });
      </script>
@endsection
