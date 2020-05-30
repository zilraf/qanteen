<?php 
  require('config/db.php');
  session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Jajan Online | Qanteen</title>
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
<div id="top">

	<div class="shell">

		<!-- Header -->
		<div id="header">
			<h1 id="logo"><a href="#">Qanteen</a></h1>
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

		<!-- Slider -->
		<div id="slider">
			<div id="slider-holder">
				<ul>
				    <li><a href="#"><img src="css/images/slide1.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/slide4.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/slide2.jpg" alt="" /></a></li>
				    <li><a href="#"><img src="css/images/slide3.jpg" alt="" /></a></li>
				</ul>
			</div>
			<div id="slider-nav">
				<a href="#" class="prev">Previous</a>
				<a href="#" class="next">Next</a>
			</div>
		</div>
		<!-- End Slider -->

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
					<a href="cart.php">Cart</a>
				</span>
			</div>
		</div>
		<!-- End Border -->

		<!-- Content -->
		<div id="content">

			<!-- Tabs -->
			<div class="tabs">
				<ul>
				    <li><a href="#" class="active"><span>Makanan</span></a></li>
				    <li><a href="#" ><span>Snack</span></a></li>
				    <li><a href="#" class="red"><span>Minuman</span></a></li>
				</ul>
			</div>
			<!-- Tabs -->

			<!-- Container -->
			<div id="container">

				<div class="tabbed">

					<!-- First Tab Content -->
					<div class="tab-content" style="display:block;">
						<div class="items">
							<div class="cl">&nbsp;</div>
							<ul>
							<?php
                    			$queryMakanan = "SELECT * FROM tabel_menu WHERE idKategori='1' LIMIT 0,4";
								$query_makanan = mysqli_query($conn,$queryMakanan);

									while($arrayMakanan = mysqli_fetch_array($query_makanan)){
											echo'<li>';
									    	echo'<div class="image">
									    		<a href="#"><img src="css/images/menu/'.$arrayMakanan['path'].'"></a>
									    	</div>
									    	<p>
									    		Nama: <span>'.$arrayMakanan['nama'].'</span><br />
									    		Keterangan: <span>'.$arrayMakanan['keterangan'].'</span><br />
									    		harga: <span>Rp.'.$arrayMakanan['harga'].'</span>
											</p>
											<button type="button" class="btn btn-success">Stock : '.$arrayMakanan['stock'].'</button>
											';
													if(isset($_SESSION['idUser'])){
					                					if($arrayMakanan['stock'] > 0){
					                  					echo '
					                  					<a href="proses/addtocart.php?idMenu='.$arrayMakanan['idMenu'].'&idUser='.$iduser.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
					                					';
					                					}else{
					                  					echo '
					                  					<button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
					                					';
					                					}
					              					}else{
					                				echo '
					                 				<button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
					                				';
					              					}
									  			echo'</li>';
												}

              				?>
							</ul>
							<div class="cl">&nbsp;</div>
						</div>
					</div>
					<!-- End First Tab Content -->

					<!-- Second Tab Content -->
					<div class="tab-content">
						<div class="items">
							<div class="cl">&nbsp;</div>
							<ul>
							<?php
                    			$querySnack = "SELECT * FROM tabel_menu WHERE idKategori='3' LIMIT 0,4";
								$query_snack = mysqli_query($conn,$querySnack);

									while($arraySnack = mysqli_fetch_array($query_snack)){
											echo'<li>';
									    	echo'<div class="image">
									    		<a href="#"><img src="css/images/menu/'.$arraySnack['path'].'"></a>
									    	</div>
									    	<p>
									    		Nama: <span>'.$arraySnack['nama'].'</span><br />
									    		Keterangan: <span>'.$arraySnack['keterangan'].'</span><br />
									    		harga: <span>Rp.'.$arraySnack['harga'].'</span>
									    	</p>';
													if(isset($_SESSION['idUser'])){
					                					if($arraySnack['stock'] > 0){
					                  					echo '
					                  					<a href="proses/addtocart.php?idMenu='.$arraySnack['idMenu'].'&idUser='.$iduser.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
					                					';
					                					}else{
					                  					echo '
					                  					<button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
					                					';
					                					}
					              					}else{
					                				echo '
					                 				<button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
					                				';
					              					}
									  			echo'</li>';
												}

              				?>
							</ul>
							<div class="cl">&nbsp;</div>
						</div>
					</div>
					<!-- End Second Tab Content -->

					<!-- Third Tab Content -->
					<div class="tab-content">
						<div class="items">
							<div class="cl">&nbsp;</div>
							<ul>
							<?php
                    			$queryMinuman = "SELECT * FROM tabel_menu WHERE idKategori='2' LIMIT 0,4";
								$query_minuman = mysqli_query($conn,$queryMinuman);

									while($arrayMinuman = mysqli_fetch_array($query_minuman)){
											echo'<li>';
									    	echo'<div class="image">
									    		<a href="#"><img src="css/images/menu/'.$arrayMinuman['path'].'"></a>
									    	</div>
									    	<p>
									    		Nama: <span>'.$arrayMinuman['nama'].'</span><br />
									    		Keterangan: <span>'.$arrayMinuman['keterangan'].'</span><br />
									    		harga: <span>Rp.'.$arrayMinuman['harga'].'</span>
											</p>
											<button type="button" class="btn btn-success">Stock : '.$arrayMinuman['stock'].'</button>';
													if(isset($_SESSION['idUser'])){
					                					if($arrayMinuman['stock'] > 0){
					                  					echo '
					                  					<a href="proses/addtocart.php?idMenu='.$arrayMinuman['idMenu'].'&idUser='.$iduser.'"><button type="button" class="btn btn-info">Masukkan Keranjang</button></a>
					                					';
					                					}else{
					                  					echo '
					                  					<button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
					                					';
					                					}
					              					}else{
					                				echo '
					                 				<button type="button" class="btn btn-info disabled">Masukkan Keranjang</button>
					                				';
					              					}
									  			echo'</li>';
												}

              				?>
							</ul>
							<div class="cl">&nbsp;</div>
						</div>
					</div>
					<!-- End Third Tab Content -->

					<div id="footer-menu">
						<form action="proses/feedback.php" method="post" class="form-feedback">
							<h5><center>Kirim Feedback</center></h5>
          					<div class="form-group">
            					<input type="text" class="form-control" name="nama" placeholder="Nama">
          					</div>
          					<div class="form-group">
            					<input type="text" class="form-control" name="email" placeholder="Email">
          					</div>
          					<div class="form-group">
           						<textarea class="form-control" name="message" placeholder="Masukkan pesan "></textarea>
          					</div>
          					<br /><button type="submit" class="btn btn-sm btn-block btn-primary">Kirim</button>
        				</form>
					</div>

				</div>

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
