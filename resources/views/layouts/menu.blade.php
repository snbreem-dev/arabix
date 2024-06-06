<nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
    <div class="container-fluid"> <!--begin::Start Navbar Links-->
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i
                        class="bi bi-list"></i> </a></li>
            <li class="nav-item d-none d-md-block"><a href="{{route('dashboard.home')}}"
                                                      class="nav-link">@lang('Home')</a></li>
        </ul> <!--end::Start Navbar Links-->
        <!--begin::End Navbar Links-->
        <ul class="navbar-nav ms-auto">
            <!--begin::Notifications Dropdown Menu-->
            <li class="nav-item dropdown"><a class="nav-link" data-bs-toggle="dropdown" href="#"> <i
                        class="bi bi-translate"></i></a>
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                    @foreach($front_languages as $language)
                        <a href="{{route('dashboard.change-language',$language['code'])}}"
                           class="dropdown-item">
                            <i class="bi bi-envelope me-2"></i>{{$language['name']}}
                        </a>
                        <div class="dropdown-divider"></div>
                    @endforeach
                </div>
            </li> <!--end::Notifications Dropdown Menu-->
        </ul>
        <!--end::End Navbar Links-->
    </div> <!--end::Container-->
</nav> <!--end::Header--> <!--begin::Sidebar-->

