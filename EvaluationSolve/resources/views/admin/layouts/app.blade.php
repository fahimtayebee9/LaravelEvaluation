<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.includes.header')

    @include('admin.includes.css')
</head>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('admin.includes.sidebar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('admin.includes.header_nav')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        @yield('body')

        @include('admin.includes.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    @include('admin.includes.scripts')
    
</body>

</html>
