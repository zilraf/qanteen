<?php
  session_start();
  require('config/db.php');
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
<div id="simple-top">

	<div class="shell">

		<!-- Header -->
		<div id="header">
			<h1 id="logo"><a href="home.php">Qanteen</a></h1>
			<div id="navigation">
				<ul>
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

				<div>
				<form action="proses/proseslogin.php" method="post" class="form-signin">
         			<input type="email" class="form-control" id="email" name="email" placeholder="Username">
          			<input type="password" class="form-control" id="pwd" name="password" placeholder="Password">

        			<button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
        			<br />
        			<p><center>Belum memiliki akun? Silahkan <a href="register.php"></b>Daftar</b></center></p>
        			
      			</form>
				</div>
				

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
