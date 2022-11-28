<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link text-center">
        <img src="/lte-dist/img/AdminLTELogo.png" alt="Remodela Tu Mundo" class=" img-circle elevation-3"
            style="opacity: 1; width:100%; max-width:180px" >
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Avatar::create(Auth::user()->name)->toBase64() }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                        <li class="nav-item">
                    <a href="/home" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            {{ __('Dashboard') }}
                        </p>
                    </a>
                </li>



                @can('users_list')
                <li class="nav-item">
                    <a href="/users" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            {{ __('Usuarios') }}
                        </p>
                    </a>
                </li>
                @endcan
                @can('roles_list')
                <li class="nav-item">
                    <a href="/roles" class="nav-link">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            {{ __('Perfil') }}
                        </p>
                    </a>
                </li>
                @endcan


        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-address-book"></i>
              <p>
                Contactos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              @can('client_list')
              <li class="nav-item">
                <a href="/client" class="nav-link">
                  <i class="fas fa-circle nav-icon text-info"></i>
                  <p>Clientes</p>
                </a>
              </li>
              @endcan

              <li class="nav-item">
                <a href="/provider" class="nav-link">
                  <i class="fas fa-circle nav-icon text-warning"></i>
                  <p>Proveedores</p>
                </a>
              </li>


            </ul>
          </li>

{{--
                <li class="nav-item">
                    <a href="/budget" class="nav-link">
                        <i class="nav-icon fas fa-receipt"></i>
                        <p>
                            {{ __('Presupuesto') }}
                        </p>
                    </a>
                </li>





                <li class="nav-item">
                    <a href="/invoice" class="nav-link">

                        <i class="nav-icon fas fa-file-invoice-dollar"></i>
                        <p>
                            {{ __('Facturas') }}
                        </p>
                    </a>
                </li>


                <li class="nav-item">
                    <a href="/orders" class="nav-link">

                        <i class="nav-icon fas fa-store-alt"></i>
                        <p>
                            {{ __('Ordenes de compra') }}
                        </p>
                    </a>
                </li> --}}



        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-icons"></i>
                <p>
                    Materiales
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">

                @can('client_list')
                <li class="nav-item">
                    <a href="/inventory" class="nav-link">
                        <i class="fas fa-circle nav-icon text-indigo"></i>
                        <p>Inventario</p>
                    </a>
                </li>
                @endcan

                <li class="nav-item">
                    <a href="/materiales" class="nav-link">
                        <i class="fas fa-circle nav-icon text-maroon"></i>
                        <p>Contra Pedido</p>
                    </a>
                </li>


            </ul>
        </li>



                <li class="nav-item">
                    <a href="/services" class="nav-link">

                        <i class="nav-icon fas fa-hammer"></i>
                        <p>
                            {{ __('Servicios') }}
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
