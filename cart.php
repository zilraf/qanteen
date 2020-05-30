<?php
  require('config/db.php');
  session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Qanteen.com</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!--[if lte IE 6]>
		<style type="text/css" media="screen">
			.tabbed { height:420px; }
		</style>
	<![endif]-->

	<script src="js/jquery-1.4.1.min.js" type="text/javascript"></script>
	<script src="js/jquery.jcarousel.pack.js" type="text/javascript"></script>
	<script src="js/jquery.slide.js" type="text/javascript"></script>
	<script src="js/jquery-func.js" type="text/javascript"></script>

</head>
<body>
<!-- Top -->
<div id="simple-top">

	<div class="shell">

		<!-- Header -->
    <div id="header">
      <h1 id="logo"><a href="home.php">Qanteen</a></h1>
      <div id="navigation">
        <ul>
        <li>
              <?php 
              $conn = mysqli_connect('localhost', 'root', '', 'qanteen');
              if(isset($_SESSION['idUser'])){
                $iduser = $_SESSION['idUser'];
                $queryUser = mysqli_query($conn, "SELECT * FROM tabel_user WHERE idUser='$_SESSION[idUser]'");
                $arrayUser = mysqli_fetch_array($queryUser);
                echo '
                  <a href="proses/logout.php"><button class="btn navbar-btn" id="btn-logout";
                    background-color: white;"><b>Logout</b></button></a>
                  ';
              }else{
                echo '
                <a href="index.php"><button class="btn navbar-btn" id="btn-login"><b>Login</b></button>
                  ';
                }
              ?>
              </li>
          <li class="last"><a href="credit.html">About</a></li>
        </ul>
      </div>
    </div>
    <!-- End Header -->

	</div>
</div>
<!-- Top -->

<!-- Main -->
<div id="main">
	<div class="shell">

		<!-- Border -->
		<div class="options">
			<div class="right">
				<span class="left more-links">
				</span>
			</div>
		</div>
		<!-- End Border -->

		<!-- Content -->
		<div id="content">

			<!-- Container -->
			<div id="container">


            <table class="table">
          <thead>
            <tr>
              <h3><strong>Keranjang Belanja</strong></h3>
            </tr>
          </thead>
          <tbody>
          <?php 
            
            $queryKeranjang = mysqli_query($conn, "SELECT * FROM tabel_cart WHERE idUser='$_SESSION[idUser]' ");
            $jumlah = mysqli_num_rows($queryKeranjang);

            if($jumlah > 0){
              $queryCart = "SELECT * FROM tabel_cart WHERE idUser='$_SESSION[idUser]'";
            $query_cart = mysqli_query($conn, $queryCart);
            while($arrayCart = mysqli_fetch_array($query_cart)){
              $queryMenu = mysqli_query($conn, "SELECT * FROM tabel_menu WHERE idMenu='$arrayCart[idMenu]'");
              $arrayMenu = mysqli_fetch_array($queryMenu);

              echo '
                <tr>
                  <td><img src="css/images/menu/'.$arrayMenu['path'].'"></td>
                  <td>
                    <h4><strong>'.$arrayMenu['nama'].'</strong></h4>
                    <h5><strong>Harga</strong><span class="titik-harga">:</span> Rp.'.$arrayMenu['harga'].'</h5>
                    <form action="proses/updateCart.php" method="post">
                    <div class="form-group">
                        <label for="jumlah"><strong>Jumlah</strong><span>:</span></label>
                        <input type="hidden" name="harga" value="'.$arrayMenu['harga'].'">
                        <input type="hidden" name="idCart" value="'.$arrayCart['idCart'].'">
                        <input type="number" value="'.$arrayCart['jumlah'].'" name="jumlah" min="1" max="'.$arrayMenu['stock'].'" style="margin-left:-1vw">
                        </div>
                      </form>
                    <h5><strong>Total</strong><span>: Rp. '.$arrayCart['harga'].'</span></h5>
                  </td>
                  <td><a href="proses/cancelCart.php?idCart='.$arrayCart['idCart'].'"><button type="button" class="btn btn-warning"><strong>Batal Beli</strong></button></a></td>
                </tr>
              ';
            }
            ?>
            <tr id="total-bayar">
              <?php 
              $queryTotalBayar = mysqli_query($conn, "SELECT SUM(harga) FROM tabel_cart WHERE idUser='$_SESSION[idUser]'");
              $arrayTotal = mysqli_fetch_array($queryTotalBayar);
              echo '
                <td>
                  <h4><strong>Total Bayar : Rp. '.$arrayTotal[0].'</strong></h4>
                </td>
              ';
               ?>

              
              <td></td>
              <td></td>
            </tr>
            <?php
            $belumAda = 0;
          }else{
            $belumAda = 1;
            echo '
              <div>
                <div style="background: #6cd83a;height: 10vh; color:white; line-height:10vh;margin-left:20vw; border-radius:10px; text-align:center">
                  <p>Keranjang Masih Kosong !!!</p>
                </div>
              </div>
              ';
            }

           ?>           
          </tbody>
        </table>

        <?php
if($belumAda==0){
  echo '
  <div class="container" id="beli">
  <a href="proses/payment.php?idUser='.$_SESSION['idUser'].'&&total='.$arrayTotal[0].'"><button type="button" class="btn btn-success"><strong>Beli Sekarang</strong></button></a>
  <a href="home.php"><button type="button" class="btn btn-success" style="margin-left:38vw"><strong>Kembali Berbelanja</strong></button></a>
</div>
';
}


 ?>

				<br />
   				<br />
    			<br />
    			<br />
    			<br />
    			<br />
    			<br />
    			<br />
   				<br />
    			<br />
    			<br />
    			<br />

				<!-- Footer -->
				<div id="footer">
					<div class="right">
						&copy; Kantin Sekolah <a href="duckduckgo.com" target="_blank" title="CSS Templates">Sekolah.com</a>
					</div>
				</div>
				<!-- End Footer -->

			</div>
			<!-- End Container -->

		</div>
		<!-- End Content -->

	</div>
</div>
<!-- End Main -->

</body>
</html>
