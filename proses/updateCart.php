<?php 
  require("../config/db.php");

  $idCart = $_POST['idCart'];
  $harga = $_POST['harga'];
  $total = $_POST['jumlah'] * $harga;

  $query = mysqli_query($conn,"UPDATE tabel_cart SET jumlah='$_POST[jumlah]', harga='$total' WHERE idCart='$idCart'");
  if($query){
    header("location:../cart.php");
  }



 ?>