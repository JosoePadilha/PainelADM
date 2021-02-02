    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="" class="brand-link">
            @if(Auth::user()->avatar)
                <img alt="Logo" class="logo img-circle elevation-3" src="{{ url('storage/'.Auth::user()->avatar) }}">
            @else
                <img alt="Logo" class="logo img-circle elevation-3" style="opacity: .8" src="{{ url('storage/avatarDefault.png') }}" alt="logo">
            @endif
            <span class="brand-text font-weight-light">Logo</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    @if(Auth::user()->avatar)
                        <img src="{{ url('storage/'.Auth::user()->avatar) }}" class="img-circle elevation-3" alt="User Image">
                    @else
                        <img src="{{ url('storage/avatarDefault.png') }}" class="img-circle elevation-3" alt="User Image">
                    @endif
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{Auth::user()->name}}</a>
                </div>
            </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    <a href="/dashboard" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-handshake"></i>
                  <p>
                    Clientes
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/createdClient" class="nav-link">
                      <i class="far fa-plus-square"></i>
                      <p>Cadastrar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/showClients" class="nav-link">
                      <i class="fa fa-list-ul" aria-hidden="true"></i>
                      <p>Listar</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="fa fa-users" aria-hidden="true"></i>
                  <p>
                    Colaboradores
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="/createdCollaborator" class="nav-link">
                      <i class="fa fa-user-plus" aria-hidden="true"></i>
                      <p>Cadastrar</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="/showCollaborator" class="nav-link">
                      <i class="fa fa-list-ul" aria-hidden="true"></i>
                      <p>Listar</p>
                    </a>
                  </li>
                </ul>
              </li>

              <li class="nav-header">EXAMPLES</li>
              <li class="nav-item">
                <a href="pages/calendar.html" class="nav-link">
                  <i class="nav-icon far fa-calendar-alt"></i>
                  <p>
                    Calendar
                    <span class="badge badge-info right">2</span>
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/logout" class="nav-link">
                  <i class="nav-icon far fa-image"></i>
                  <p>
                    Sair
                  </p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
      </aside>
