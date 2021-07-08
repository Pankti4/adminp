<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

<!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('assests/images/AdminLTELogo.png')?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url('assests/images/user2-160x160.jpg');?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- <ul class="sidebar navbar-nav"> -->
        <li class="nav-item active">
          <a class="nav-link" href="<?php echo site_url('user/Dashboard'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
     
         <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('user/User_profile'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>My Profile</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('user/Change_password'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Change Password</span></a>
        </li>
      

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('user/Country'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Country</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('user/State'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>States</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('user/City'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>City</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('user/Category'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Categories</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('user/Subcate'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Sub Categories</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('user/Product'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Products</span></a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('user/Productimage'); ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Product Image</span></a>
        </li> 


    <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('user/Login/logout'); ?>">
      <i class="fas fa-sign-out-alt"></i>
            <span>Log Out</span></a>
        </li>

      </ul>


  </aside>