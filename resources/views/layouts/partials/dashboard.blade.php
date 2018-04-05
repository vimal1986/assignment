<!DOCTYPE html>
<html lang="en">
@include('layouts.partials.htmlheader')
@stack('styles')
<body class="skin-blue sidebar-mini">
<div id="app" v-cloak>
    <div class="wrapper">

    @include('layouts.partials.mainheader')

    @include('layouts.partials.sidebar')

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

        @include('layouts.partials.contentheader')

        <!-- Main content -->
            <section class="content">
                <!-- Your Page Content Here -->
                @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->


    </div><!-- ./wrapper -->
</div>
@include('layouts.partials.footer')
@stack('scripts')
@stack('map-scripts')
</body>
</html>