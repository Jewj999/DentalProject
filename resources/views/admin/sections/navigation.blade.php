<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{ route('admin.dashboard') }}" class="site_title">
                <span>{{ config('app.name') }}</span>
            </a>
        </div>

        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src="{{ auth()->user()->avatar }}" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <h2>{{ auth()->user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>{{ __('views.backend.section.navigation.sub_header_0') }}</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_0_1') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.consultation.active')}}">
                            <i class="fa fa-bell"></i>
                            Atender
                        </a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Administracion</h3>
                <ul class="nav side-menu">
                    <li>
                        <a href="{{ route('admin.pacientes.list') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            Pacientes
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.servicios.list') }}">
                            <i class="fa fa-check-square" aria-hidden="true"></i>
                            Servicios
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.appointment.list')}}">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            Citas
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.turn')}}">
                            <i class="fa fa-address-card" aria-hidden="true"></i>
                            Turno
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_1_1') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.restore') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_1_3') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.permissions') }}">
                            <i class="fa fa-key" aria-hidden="true"></i>
                            {{ __('views.backend.section.navigation.menu_1_2') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.report')}}">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            Reporteria
                        </a>
                    </li>
                    <li>
                        <a href="{{route('admin.logs.list')}}">
                            <i class="fa fa-archive" aria-hidden="true"></i>
                            Auditoria
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
    </div>
</div>