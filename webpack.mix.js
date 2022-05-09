const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js').postCss('resources/css/app.css', 'public/css', [
    require('postcss-import'),
    require('tailwindcss'),
    require('autoprefixer'),
])
.scripts([
    'resources/vendor/jquery/dist/jquery.min.js',
    'resources/vendor/bootstrap/dist/js/bootstrap.bundle.min.js',
    'resources/vendor/fastclick/lib/fastclick.js',
    'resources/vendor/nprogress/nprogress.js',
    'resources/vendor/Chart.js/dist/Chart.min.js',
    'resources/vendor/gauge.js/dist/gauge.min.js',
    'resources/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js',
    'resources/vendor/iCheck/icheck.min.js',
    'resources/vendor/skycons/skycons.js',
    'resources/vendor/Flot/jquery.flot.js',
    'resources/vendor/Flot/jquery.flot.pie.js',
    'resources/vendor/Flot/jquery.flot.time.js',
    'resources/vendor/Flot/jquery.flot.stack.js',
    'resources/vendor/Flot/jquery.flot.resize.js',
    'resources/vendor/flot.orderbars/js/jquery.flot.orderBars.js',
    'resources/vendor/flot-spline/js/jquery.flot.spline.min.js',
    'resources/vendor/flot.curvedlines/curvedLines.js',
    'resources/vendor/DateJS/build/date.js',
    'resources/vendor/jqvmap/dist/jquery.vmap.js',
    'resources/vendor/jqvmap/dist/maps/jquery.vmap.world.js',
    'resources/vendor/jqvmap/examples/js/jquery.vmap.sampledata.js',
    'resources/vendor/moment/min/moment.min.js',
    'resources/vendor/bootstrap-daterangepicker/daterangepicker.js',
    'resources/vendor/datatables.net/js/jquery.dataTables.min.js',
    'resources/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js',
    'resources/vendor/datatables.net-buttons/js/dataTables.buttons.min.js',
    'resources/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
    'resources/vendor/datatables.net-buttons/js/buttons.flash.min.js',
    'resources/vendor/datatables.net-buttons/js/buttons.html5.min.js',
    'resources/vendor/datatables.net-buttons/js/buttons.print.min.js',
    'resources/vendor/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js',
    'resources/vendor/datatables.net-keytable/js/dataTables.keyTable.min.js',
    'resources/vendor/datatables.net-responsive/js/dataTables.responsive.min.js',
    'resources/vendor/datatables.net-responsive-bs/js/responsive.bootstrap.js',
    'resources/vendor/datatables.net-scroller/js/dataTables.scroller.min.js',
    'resources/vendor/jszip/dist/jszip.min.js',
    'resources/vendor/pdfmake/build/pdfmake.min.js',
    'resources/vendor/pdfmake/build/vfs_fonts.js',
    'resources/vendor/js/custom.min.js',
    'resources/js/dependent-dropdown.js',
], 'public/js/scripts.js')
.styles([
    'resources/vendor/bootstrap/dist/css/bootstrap.min.css',
    'resources/vendor/nprogress/nprogress.css',
    'resources/vendor/iCheck/skins/flat/green.css',
    'resources/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css',
    'resources/vendor/jqvmap/dist/jqvmap.min.css',
    'resources/vendor/bootstrap-daterangepicker/daterangepicker.css',
    'resources/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css',
    'resources/vendor/datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
    'resources/vendor/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css',
    'resources/vendor/datatables.net-responsive-bs/css/responsive.bootstrap.min.css',
    'resources/vendor/datatables.net-scroller-bs/css/scroller.bootstrap.min.css',
    'resources/vendor/css/custom.min.css',
], 'public/css/styles.css');
