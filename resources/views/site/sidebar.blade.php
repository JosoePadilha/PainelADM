<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand brand-link">
        <img class="logo img-circle elevation-3" style="opacity: .8" src="{{ url('storage/protelim.jpg') }}" alt="logo">
        <span class="brand-text font-weight-light">Painel ADM</span>
    </a>

    <div class="sidebar">
        <div class="user-panel">
            <div class="image">
                @if(Auth::user()->avatar)
                    <img src="{{ url('storage/'.Auth::user()->avatar) }}" class="avatar img-circle elevation-3" alt="User Image">
                @else
                    @if(Auth::guard('client')->check() && Auth::guard('client')->user()->type == 'Cliente')
                        <img src="{{ url('storage/'.Auth::guard('client')->user()->avatar) }}" class="avatar img-circle elevation-3" alt="User Image">
                    @else
                        <img src="{{ url('storage/avatarDefault.png') }}" class="avatar img-circle elevation-3" alt="User Image">
                    @endif
                    <img src="{{ url('storage/avatarDefault.png') }}" class="avatar img-circle elevation-3" alt="User Image">
                @endif

            </div>
            <div class="info">
                <a href="#" class="d-block brand-text">{{Session('firstNameUser')}}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu-open">
                    @if ((Auth::user()->type == 'Adm'))
                        <a href="/dashboard" class="nav-link">
                    @else
                        @if (Auth::guard('client')->check() && Auth::guard('client')->user()->type == 'Cliente')
                            <a href="/dashboardClient" class="nav-link">
                        @endif
                    @endif
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                @if (Auth::user()->type == 'Adm')
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
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fab fa-buffer"></i>
                            <p> Família de produtos
                            <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/createFamily" class="nav-link">
                                    <i class="far fa-plus-square"></i>
                                    <p>Cadastrar família</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/showFamily" class="nav-link">
                                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                                    <p>Listar famílias</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-dolly"></i>
                            <p> Produtos
                            <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/createProduct" class="nav-link">
                                    <i class="far fa-plus-square"></i>
                                    <p>Cadastrar produto</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/showProducts" class="nav-link">
                                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                                    <p>Listar produtos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fa fa-folder-open" aria-hidden="true"></i>
                            <p> Documentos
                            <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/showClientDocument" class="nav-link">
                                    <i class="fa fa-file-pdf" aria-hidden="true"></i>
                                    <p>Enviar documento</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-images"></i>
                            <p> Gestão da marca
                            <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/createImage" class="nav-link">
                                    <i class="far fa-file-image"></i>
                                    <p>Cadastrar imagens</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/showImages" class="nav-link">
                                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                                    <p>Listar imagens</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-comments"></i>
                            <p> Avisos
                            <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/createWarning" class="nav-link">
                                    <i class="far fa-comment-dots"></i>
                                    <p>Cadastrar aviso</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/showWarnings" class="nav-link">
                                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                                    <p>Listar avisos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::guard('client')->check() && Auth::guard('client')->user()->type == 'Cliente')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-dolly"></i>
                            <p> Produtos
                            <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/showProductsCLient" class="nav-link">
                                    <i class="fa fa-list-ul" aria-hidden="true"></i>
                                    <p>Listar produtos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="/logout" class="nav-link">
                        <i class="fa fa-reply-all"></i>
                        <p>Sair</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
