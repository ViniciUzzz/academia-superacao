<!--  Sidebar -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="<?php echo base_url("dashboard") ?>" class="text-nowrap logo-img">
                <img src="<?php echo base_url('assets/admin/images/logos/dark-logo.svg')?>" width="180" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo base_url("dashboard")?>" >
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo base_url("perfil")?>">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Perfil</span>
                    </a>
                </li>
                <li class="nav-small-cap" style="display: <?php echo $user_info->admin ? 'block' : 'none'; ?>">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Gerenciamento</span>
                </li>
                <li class="sidebar-item" style="display: <?php echo $user_info->admin ? 'block' : 'none'; ?>">
                    <a class="sidebar-link" href="<?php echo base_url("gerenciamento/listar_usuarios")?>" aria-expanded="false">
                        <span>
                            <i class="bi bi-people-fill"></i>
                        </span>
                        <span class="hide-menu">Usuários</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo $user_info->admin ? base_url("gerenciamento/avaliacoes") : base_url("gerenciamento/avaliacoes_usuario/$user_info->id"); ?>">
                        <span>
                            <i class="bi bi-card-checklist"></i>
                        </span>
                        <span class="hide-menu">Avaliações</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!--  Sidebar End -->