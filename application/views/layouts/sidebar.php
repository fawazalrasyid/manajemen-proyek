<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url(); ?>">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Manajemen Proyek</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url(); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
     <div class="sidebar-heading">Data</div>

    <!-- Nav Item - Lokasi -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('lokasi'); ?>">
            <i class="fas fa-map-marker-alt"></i>
            <span>Lokasi</span></a>
    </li>

    <!-- Nav Item - Proyek -->
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('proyek'); ?>">
            <i class="fas fa-project-diagram"></i>
            <span>Proyek</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
