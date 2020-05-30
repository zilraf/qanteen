<?php 
  $conn = mysqli_connect('localhost', 'root', '', 'qanteen');

  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $message = $_POST['message'];
  $query = mysqli_query($conn, " INSERT INTO tabel_feedback (nama, email, message) VALUES ('$nama', '$email', '$message')");
  
  if($query){
    echo '
      <script>
        alert("Feedback sudah dikirim !");
        window.location = "../home.php"
      </script>
    ';
  }else{
    echo '
      <script>
        alert("Feedback tidak terkirim, coba ulangi !");
        window.location = "../home.php"
      </script>
    ';
  }
 ?>