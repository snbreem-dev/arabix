<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="{{route("dashboard.home")}}" class="brand-link">
            <!--begin::Brand Image--> <img src="{{asset('dist/assets/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                                           class="brand-image opacity-75 shadow"> <!--end::Brand Image-->
            <!--begin::Brand Text--> <span class="brand-text fw-light">Arabixlte</span> <!--end::Brand Text--> </a>
        <!--end::Brand Link--> </div> <!--end::Sidebar Brand--> <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{route("dashboard.customers.index")}}" class="nav-link {{$activeMenu == 'customers' ? 'active' : ''}}">
                        <i class="nav-icon bi bi-browser-edge"></i>
                        <p>@lang('Customers')</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route("dashboard.transactions.index")}}" class="nav-link {{$activeMenu == 'transactions' ? 'active' : ''}}"> <i
                            class="nav-icon bi bi-hand-thumbs-up-fill"></i>
                        <p>@lang('Transactions')</p>
                    </a>
                </li>
            </ul> <!--end::Sidebar Menu-->
        </nav>
    </div> <!--end::Sidebar Wrapper-->
</aside> <!--end::Sidebar--> <!--begin::App Main-->

