<?php 
  session_start();
  require('../config/db.php');
  
  $idMenu = $_GET['idMenu'];
  $idUser = $_GET['idUser'];

  $query = mysqli_query($conn, "SELECT harga FROM tabel_menu WHERE idMenu='$idMenu'");
  $data = mysqli_fetch_array($query);
  $harga = $data['harga'];
  
  $queryInsert = mysqli_query($conn, "INSERT INTO tabel_cart (idUser, idMenu, jumlah, harga) VALUES ('$idUser','$idMenu',1,'$harga')");

  if($queryInsert){
    header('location: ../cart.php');
  }



 ?>