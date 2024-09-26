<aside class="main-sidebar sidebar-light-warning elevation-1 position-fixed">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="" style="margin-top: 50px;">
            <div class="image">
                <a href="{{ route("dashboard") }}" class="brand-link">
                    <img
                        src="{{ asset("logonew.png") }}"
                        alt=""
                        class="brand-image img-circle elevation-1"
                        style="opacity: 0.8"
                    />
                    <span class="brand-text font-weight-bold"> {{ auth()->user()->name }}</span>
                </a>
            </div>
            
        </div>

        <!-- Sidebar Menu -->
        <nav  style="margin-top: 30px;">
            <ul
                class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false"
            >
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li
                    class="nav-item has-treeview {{ Request::is("car*") || Request::is("unit*") ? "menu-open" : "" }}"
                >
                    <a
                        href="#"
                        class="nav-link {{ Request::is("car*") || Request::is("unit*") ? "active" : "" }}"
                    >
                        <i class="nav-icon fas fa-car"></i>
                        <p>
                            Car
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a
                                href="{{ route("car.index") }}"
                                class="nav-link"
                            >
                                <i class="nav-icon fas fa-list"></i>
                                <p>Cars List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                href="{{ route("unit.index") }}"
                                class="nav-link"
                            >
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>List Unit</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a
                        href="{{ route("driver.index") }}"
                        class="nav-link {{ Request::is("driver*") ? "active" : "" }}"
                    >
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>Drivers</p>
                    </a>
                </li>

                <li
                    class="nav-item has-treeview {{ Request::is("booking*") ? "menu-open" : "" }}"
                >
                    <a
                        href="#"
                        class="nav-link {{ Request::is("booking*") ? "active" : "" }}"
                    >
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Administrasi
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a
                                href="{{ route("booking.index") }}"
                                class="nav-link"
                            >
                                <i class="nav-icon fas fa-list-alt"></i>
                                <p>Pesanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                href="{{ route("booking.sewa") }}"
                                class="nav-link"
                            >
                                <i class="nav-icon fas fa-shopping-cart"></i>
                                <p>Disewa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a
                                href="{{ route("booking.selesai") }}"
                                class="nav-link"
                            >
                                <i class="nav-icon fas fa-check-circle"></i>
                                <p>Selesai</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @if(auth()->user()->role == "SuperAdmin")
                    <li class="nav-item">
                        <a
                            href="{{ route("user.index") }}"
                            class="nav-link {{ Request::is("user*") ? "active" : "" }}"
                        >
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Users
                                <i class="right fas fa-lock"></i>
                            </p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
