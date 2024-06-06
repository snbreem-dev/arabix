<!DOCTYPE html>
<html lang="en" @if(\Illuminate\Support\Facades\App::getLocale() == 'ar') dir="rtl" @endif> <!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Arabixlte | Dashboard</title><!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="AdminLTE v4 | Dashboard">
    <meta name="author" content="ColorlibHQ">
    <meta name="description"
          content="AdminLTE is a Free Bootstrap 5 Admin Dashboard, 30 example pages using Vanilla JS.">
    <meta name="keywords"
          content="bootstrap 5, bootstrap, bootstrap 5 admin dashboard, bootstrap 5 dashboard, bootstrap 5 charts, bootstrap 5 calendar, bootstrap 5 datepicker, bootstrap 5 tables, bootstrap 5 datatable, vanilla js datatable, colorlibhq, colorlibhq dashboard, colorlibhq admin dashboard">
    <!--end::Primary Meta Tags--><!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
          integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css"
          integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous">
    <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css"
          integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous">
    <!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{asset(\Illuminate\Support\Facades\App::getLocale() == 'ar' ? 'dist/css/adminlte.rtl.css' : 'dist/css/adminlte.css')}}">

    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
          integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" crossorigin="anonymous">
    @yield('css')

</head> <!--end::Head--> <!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary"> <!--begin::App Wrapper-->
<div class="app-wrapper"> <!--begin::Header-->
    @include('layouts.menu')
    @include('layouts.sidebar')
    @yield('content')
    @include('layouts.footer')

    <div id="deleteModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 id="deleteModal">@lang('Are you sure?')</h3>
                </div>
                <div class="modal-body">
                    <p>@lang('You are about to delete. Do you want to proceed?')</p>
                </div>
                <div class="modal-footer">
                    <button id="btnDelete" class="btn btn-danger">@lang('Yes')</button>
                    <button id="btnHide" data-dismiss="modal" aria-hidden="true" class="btn btn-secondary">@lang('No')</button>
                </div>
            </div>
        </div>
    </div>

</div> <!--end::App Wrapper--> <!--begin::Script--> <!--begin::Third Party Plugin(OverlayScrollbars)-->
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/browser/overlayscrollbars.browser.es6.min.js"
        integrity="sha256-H2VM7BKda+v2Z4+DRy69uknwxjyDRhszjXFhsL4gD3w=" crossorigin="anonymous"></script>
<!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha256-whL0tQWoY1Ku1iskqPFvmZ+CHsvmRWx/PIoEvIeWh4I=" crossorigin="anonymous"></script>
<!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha256-YMa+wAM6QkVyz999odX7lPRxkoYAan8suedu4k2Zur8=" crossorigin="anonymous"></script>
<!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> <!--end::Required Plugin(AdminLTE)-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script> <!--end::Required Plugin(AdminLTE)-->
<script src="{{asset('dist/js/adminlte.js')}}"></script> <!--end::Required Plugin(AdminLTE)-->
<!--begin::OverlayScrollbars Configure-->
<script>
    const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
    const Default = {
        scrollbarTheme: "os-theme-light",
        scrollbarAutoHide: "leave",
        scrollbarClickScroll: true,
    };
    document.addEventListener("DOMContentLoaded", function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
        if (
            sidebarWrapper &&
            typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
        ) {
            OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                scrollbars: {
                    theme: Default.scrollbarTheme,
                    autoHide: Default.scrollbarAutoHide,
                    clickScroll: Default.scrollbarClickScroll,
                },
            });
        }
    });

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $('.confirm-delete').on('click', function(e) {
        // preven form submit
        e.preventDefault();

        // get the current image/form id
        var url = $(this).attr("href")

        // assign the current url and row to the modal
        $('#deleteModal').data('url', url).data('row',$(this).closest('tr')).modal('show');

    });

    $('#btnDelete').click(function(e) {
        e.preventDefault();
        var url = $('#deleteModal').data('url');
        var row = $('#deleteModal').data('row');

        deleteRecode(url, row);

        // hide modal
        $('#deleteModal').modal('hide');
    });

    $('#btnHide').click(function() {
        // hide modal
        $('#deleteModal').modal('hide');
    });

    function deleteRecode(url, row) {
        $ajax = $.ajax({
            url: url,
            data: {'_token': '{{csrf_token()}}'},
            type: 'DELETE',
            async: true,
            cache: false
        });

        $ajax.done(function (data) {
            row.remove();
            toastr[data['status']](data['text']);
            return;
        });

        $ajax.fail(function (error) {
            toastr["error"]('@lang('error occur')');
            return;
        });
    }

    function updateRecord(url, data) {

        console.log(url)
        $ajax = $.ajax({
            url: url,
            data: data,
            type: 'PUT',
            async: true,
            cache: false
        });

        $ajax.done(function (data) {
            if(data['errors']){
                toastr["error"](data['errors']['text']);
            }

            toastr[data['status']](data['text']);

            setTimeout(function () {
                window.history.back();
            }, 2000);

            return;
        });

        $ajax.fail(function (error) {
            toastr["error"]('@lang('error occur')');
            return;
        });
    }
</script>
@yield('js')
<!--end::OverlayScrollbars Configure-->
<!-- OPTIONAL SCRIPTS --> <!-- sortablejs -->
</body><!--end::Body-->

</html>
