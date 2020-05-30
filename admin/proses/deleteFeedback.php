<?php 
  require('../../config/db.php');
  $idfeedback = $_GET['idFeedback'];
  $query = mysqli_query($conn, "DELETE FROM tabel_feedback WHERE idFeedback = $idfeedback");
  if($query){
    echo '
      <script>
      alert("Feedback berhasil dihapus !");
      window.location = "../admin.php";
      </script>
    ';
  }

 ?>