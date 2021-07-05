<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<title><?= $this->config->item('site_name') ?></title>

<link rel="stylesheet" href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css') ?>">

<link rel="stylesheet" href="<?= base_url('assets/vendor/datatables-bs4/jquery.dataTables.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/vendor/datatables-bs4/dataTables.bootstrap4.min.css') ?>">

<link rel="stylesheet" href="<?= base_url('assets/vendor/chart.js/Chart.min.css') ?>">

<link rel="stylesheet" href="<?= base_url('assets/vendor/overlayScrollbars/OverlayScrollbars.min.css') ?>">

<link rel="stylesheet" href="<?= base_url('assets/vendor/tempusdominus-bootstrap-4/tempusdominus-bootstrap-4.min.css') ?>">

<link rel="stylesheet" href="<?= base_url('assets/css/adminlte.min.css') ?>">

<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

   <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.html">Product Details</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>
    </nav>

      <div class="image">
         <img src="<?php echo base_url('assets/images/download.jpeg'); ?>" class="img-circle elevation-2" alt="User Image" />

        <!-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <a href="#" class="d-block">Alexander Pierce</a>
      </div>
    
