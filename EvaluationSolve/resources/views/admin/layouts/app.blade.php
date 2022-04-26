<!DOCTYPE html>
<html lang="en">

<head>
    @include('ftsadmin.includes.header')

    @include('ftsadmin.includes.css')
</head>

<body>

    <!-- ########## START: LEFT PANEL ########## -->
    @include('ftsadmin.includes.sidebar')
    <!-- ########## END: LEFT PANEL ########## -->

    <!-- ########## START: HEAD PANEL ########## -->
    @include('ftsadmin.includes.header_nav')
    <!-- ########## END: HEAD PANEL ########## -->

    <!-- ########## START: RIGHT PANEL ########## -->
    @include('ftsadmin.includes.right_bar')
    <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel">

        @yield('body')

        @include('ftsadmin.includes.footer')
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    @include('ftsadmin.includes.scripts')
    
</body>

</html>
