<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"/>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">ClassRoom Apps</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <?php
            if($this->session->has_userdata('isLogin')){ ?>
              <a class="nav-link" aria-current="page" href="<?= base_url('Kelas') ;?>">Data Master Kelas</a>
              <a class="nav-link" href="<?= base_url('Penggunaan_kelas');?>">Penggunaan Ruang Kelas</a>
          <?php } ?>
        </div>
        <div class="d-flex ms-auto">
          <?php 
            if($this->session->has_userdata('isLogin')){ ?>
              <a href="<?= base_url('Auth/logout')?>" onclick="return confirm('Yakin akan Logout?')">Logout</a>
          <?php }else{ ?>
            <a href="#"  data-bs-toggle="modal" data-bs-target="#loginModal">
Login </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </nav>
  <div class="container">

