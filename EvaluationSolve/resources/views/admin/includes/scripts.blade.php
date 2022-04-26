<!-- Javascripts -->
<script src="{{ asset('storage/assets/lib/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('storage/assets/lib/jquery-ui/ui/widgets/datepicker.js') }}"></script>
<script src="{{ asset('storage/assets/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('storage/assets/lib/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('storage/assets/lib/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('storage/assets/lib/peity/jquery.peity.min.js') }}"></script>
<script src="{{ asset('storage/assets/lib/rickshaw/vendor/d3.min.js') }}"></script>
<script src="{{ asset('storage/assets/lib/rickshaw/vendor/d3.layout.min.js') }}"></script>
<script src="{{ asset('storage/assets/lib/rickshaw/rickshaw.min.js') }}"></script>
<script src="{{ asset('storage/assets/lib/jquery.flot/jquery.flot.js') }}"></script>
<script src="{{ asset('storage/assets/lib/jquery.flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('storage/assets/lib/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
<script src="{{ asset('storage/assets/lib/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
<script src="{{ asset('storage/assets/lib/echarts/echarts.min.js') }}"></script>
<script src="{{ asset('storage/assets/lib/select2/js/select2.full.min.js') }}"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyAq8o5-8Y5pudbJMJtDFzb8aHiWJufa5fg"></script>
<script src="{{ asset('storage/assets/lib/gmaps/gmaps.min.js') }}"></script>
<script src="{{ asset('storage/assets/lib/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('storage/assets/lib/ion-rangeslider/js/ion.rangeSlider.min.js') }}"></script>

<script src="{{ asset('storage/assets/js/bracket.js') }}"></script>
<script src="{{ asset('storage/assets/js/map.shiftworker.js') }}"></script>
<script src="{{ asset('storage/assets/js/ResizeSensor.js') }}"></script>
<script src="{{ asset('storage/assets/js/dashboard.js') }}"></script>

<script>
    $(function() {
        'use strict'
        $(window).resize(function() {
            minimizeMenu();
        });

        minimizeMenu();

        function minimizeMenu() {
            if (window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)')
                .matches) {
                // show only the icons and hide left menu label by default
                $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
                $('body').addClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideUp();
            } else if (window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass(
                'collapsed-menu')) {
                $('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
                $('body').removeClass('collapsed-menu');
                $('.show-sub + .br-menu-sub').slideDown();
            }
        }
    });
</script>

<script>
    $(document).ready(function() {
        $('#cat_description').summernote({
            height: 150
        });

        $('#subcat_description').summernote({
            height: 150
        });

        $('#subcat_description_edit').summernote({
            height: 150
        });

        $('#cat_description_edit').summernote({
            height: 150
        });

        $('#product_desc_edit').summernote({
            height: 150
        });

        $('#product_desc').summernote({
            height: 150
        });
    });
</script>
