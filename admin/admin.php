<?php 
  session_start();
  if(!isset($_SESSION['idAdmin'])){
    header('location: index.php');
  }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Jajan Online | Qanteen</title>
	<link rel="stylesheet" href="../css/style.css" type="text/css" media="all" />
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
	<div id="main">
	<div class="shell">

		<!-- Content -->
		<div id="content">

    <!-- Tabs -->
			<div class="tabs">
				<ul>
				    <li><a href="#" class="active"><span>Feedback</span></a></li>
				</ul>
			</div>
			<!-- Tabs -->

			<!-- Container -->
			<div id="container">

      <div class="tabbed">
        <div class="tab-content" style="display:block;">
        <div class="items">
          <div class="cl">&nbsp;</div>
            <ul>

              <!-- feedback -->
          <div class="row">
            <div>
                <h3><strong>Tabel Message User</strong></h3>  
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th class="id-user ">ID Message</th>
                      <th class="nama-user ">Nama</th>
                      <th class="email-user ">Email</th>
                      <th class="alamat-user ">Pesan</th>
                      <th class="hapus "></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                      $conn = mysqli_connect('localhost', 'root', '', 'qanteen');
                      $queryMessage = mysqli_query($conn, "SELECT * FROM tabel_feedback ORDER BY idFeedback ASC");
                      $jumlahMessage = mysqli_num_rows($queryMessage); 
                      if($jumlahMessage == 0){
                          echo '
                            <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Belum Ada Message</td>
                            <td></td>
                          </tr>
                        ';
                      }else{
                        while($arrayMessage = mysqli_fetch_array($queryMessage)){
                          echo '
                            <tr>
                              <td class="id-user ">'.$arrayMessage['idFeedback'].'</td>
                              <td class="nama-user ">'.$arrayMessage['nama'].'</td>
                              <td class="email-user text-justify">'.$arrayMessage['email'].'</td>
                              <td class="alamat-user text-left">'.$arrayMessage['message'].'</td>
                              <td class="hapus"><a href="proses/deleteFeedback.php?idFeedback='.$arrayMessage['idFeedback'].'">
                                <button type="button" class="btn btn-xs btn-danger">Hapus</button>
                              </a></td>
                            </tr>
                          ';
                        }
                      }
                      

                     ?>   
                  </tbody>
                </table>
              </div>
            </div>
          <!-- feedback -->

            </ul>
          <div class="cl">&nbsp;</div>
        </div>
        </div>

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
</body>
</html>