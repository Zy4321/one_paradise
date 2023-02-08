<?php 
session_start();
if(!isset($_SESSION["adname"])){
  header("location:../index.php");
}
require_once 'functions.php';
require_once 'dbh.php';
if(isset($_POST["back"])){
    echo "<script>alert('bye bye!! '); window.location.href='../dashboard.php?page=4'</script>";
    
}
    $m_price=$_POST["m_price"];
    $m_desc=$_POST["m_desc"];
    $m_type=$_POST["m_type"];
    $s=0;
if(empty($m_price)){
  echo "<script>alert('Please fill in the price!! '); window.location.href='../dashboard.php?page=4'</script>";
  exit();
}
else if(empty($m_desc)){
  echo "<script>alert('Please fill in the description!! '); window.location.href='../dashboard.php?page=4'</script>";
  exit();
}
else if(!is_numeric($m_price)){
  echo "<script>alert('Price must be a number!! '); window.location.href='../dashboard.php?page=4'</script>";
  exit();
}else

if (isset($_FILES['fileUpload']) && $_FILES['fileUpload']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['fileUpload']['tmp_name'];
    $fileName = $_FILES['fileUpload']['name'];
    $fileSize = $_FILES['fileUpload']['size'];
    $fileType = $_FILES['fileUpload']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));
 
    //sanitize file-name (to generate new file name avoiding data redundancy / clashing)
    $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
 
    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'png');
 
    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = "../Services Images/";
      // $dest_path = $uploadFileDir . $fileName;
	    $dest_path = $uploadFileDir . $newFileName;

      if(move_uploaded_file($fileTmpPath,$dest_path)) 
      {
        $dest_path ="Services Images/".$newFileName;
        if(!$conn){
            die("Connection failed: ". mysqli_connect_error());}
        $sql="UPDATE massage_type SET m_price= ?, m_desc= ?, m_img= ? WHERE
        m_type= ?;";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            exit();
        }
        mysqli_stmt_bind_param($stmt, "dsss", $m_price, $m_desc,$dest_path,$m_type);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        echo '<script>alert("Successfully update!"); window.location.href="../dashboard.php?page=4"</script>';
      }
      else
      {
        $message = 'There was some error moving the file to upload directory. Please make sure the upload directory is writable by web server.';
      }
    }
    else
    {
      echo '<script>alert("Only allow jpg or png file types!"); window.location.href="../dashboard.php?page=4"</script>';
    }
  }
  else
  {
    echo '<script>alert("please select picture"); window.location.href="../dashboard.php?page=4"</script>';
  }

?>