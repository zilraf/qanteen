<?php 
require('../config/db.php');

$idCart = $_GET['idCart'];

$query = mysqli_query($conn, "DELETE FROM tabel_cart WHERE idCart='$idCart' ");

if($query){
  header('location: ../cart.php');
}


 ?>