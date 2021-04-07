<?php
// connect and login to FTP server
require "./Connect.php";

if(isset($_POST['name'])){
  $dir = $_POST['name'];

// try to create directory $dir
if (ftp_mkdir($conn, $dir))
  {
  echo "Successfully created $dir";
  }
else
  {
  echo "Error while creating $dir";
  }

// close connection
ftp_close($conn);
}