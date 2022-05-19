<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Laboratorium PA</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url(); ?>/">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <?php if ($user_name == 'Admin Utama') { ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Hasil Lab PA
        </div>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url(); ?>/hasil">
                <i class="fas fa-fw fa-pencil-alt"></i>
                <span>Input Hasil Lab PA</span>
            </a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Settings
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-cog"></i>
                <span>Settings</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">User:</h6>
                    <a class="collapse-item" href="<?= base_url(); ?>/user/add">Add</a>
                    <a class="collapse-item" href="<?= base_url(); ?>/user">Manage</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Others:</h6>
                    <a class="collapse-item" href="<?= base_url(); ?>/rumahsakit">Daftar RS/Klinik</a>
                </div>
            </div>
        </li>
    <?php } ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>