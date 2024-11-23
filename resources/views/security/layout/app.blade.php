<!DOCTYPE html>
<html lang="en">

    @include('security.partials.head')
    @yield('styles')

    <body data-menu-color="dark" data-sidebar="default">

        <!-- Begin page -->
        <div id="app-layout">

            <!-- Topbar Start -->
            @include('security.partials.header')
            <!-- end Topbar -->

            <!-- Left Sidebar Start -->
            @include('security.partials.left-sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start Page Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <div class="content">

                    <!-- Start Content-->
                    <div class="container-xxxl">
                        @yield('content')
                    </div> <!-- container-fluid -->
                </div> <!-- content -->

                <!-- Footer Start -->
                @include('security.partials.footer')
                <!-- end Footer -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Page content -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->
        @yield('scripts')
        @include('security.partials.scripts')
        @include('sweetalert::alert')

    </body>
</html>