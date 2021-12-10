<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Aplikasi Penjualan</title>
    <link rel="stylesheet" href="<?php echo base_url(). 'asset/style.css'; ?>">
  </head>
  <?php
  if(!$_SESSION['id_user']){
    redirect('./');
  }
  ?>
  <body>
    <ul>
      <div class="container">
        <li> <a href="./">Home</a> </li>
        <?php if($_SESSION['level']==1){ ?>
        <li> <a href="<?php echo base_url().'C_product' ?>">Data Master Barang</a> </li>
        <li> <a href="<?php echo base_url().'C_users' ?>">Data Master Karyawan</a> </li>
        <?php } ?>
        <li> <a href="<?php echo base_url().'C_penjualan' ?>">Penjualan</a> </li>
        <li> <a onclick="return confirm('Apakah Anda Yakin Ingin Keluar Applikasi?')" href="<?php echo base_url().'C_login/keluar'; ?>">Logout</a> </li>
      </div>
    </ul>

    <div class="container">