<?php 

  require('../config/db.php');
  $idUser = $_GET['idUser'];
  $total = $_GET['total'];
  $queryCart = mysqli_query($conn, "SELECT * FROM tabel_cart WHERE idUser='$idUser'");
  $tanggal = date("Y-m-d H:i:s");

  $menu = "";
  while($data = mysqli_fetch_array($queryCart)){
    $queryBarang = mysqli_query($conn, "SELECT * FROM tabel_menu WHERE idMenu='$data[idMenu]'");
    $arrayBarang = mysqli_fetch_array($queryBarang);
    $kategori = $arrayBarang['kategori'];
    $nama = $arrayBarang['nama'];
    $jumlah = $data['jumlah'];
    $jumlahBarang = $arrayBarang['stock'] - $data['jumlah'];
    $updateJumlah = mysqli_query($conn, "UPDATE tabel_menu SET stock='$jumlahBarang' WHERE idMenu='$data[idMenu]'");
    $menu = $menu . $nama.", Kategori : " .$kategori.", Jumlah : " . $jumlah. "<br>";
  }

  $queryInsert = mysqli_query($conn, "INSERT INTO tabel_transaksi (idUser, daftarBarang, tanggal, total) VALUES ('$idUser', '$menu', '$tanggal', '$total')");

  $query = mysqli_query($conn, "DELETE FROM tabel_cart WHERE idUser='$idUser'");
  
  if($query){
    echo '
      <script>
      alert("Terima Kasih sudah Berbelanja!");
      window.location = "../home.php";
      </script>
    ';
  }
 ?>