<?php
session_start();
// connect and login to FTP server
require('./017/PHP/Connect.php');

if(isset($_GET["name"])){
$file = $_GET["name"];
$server_file = $_GET["name"];

// download server file
if (ftp_get($conn, $file, $server_file, FTP_ASCII))
  {
  echo ("<script LANGUAGE='JavaScript'>
  window.alert('$file Download');
  window.location.href='admin-site-ftp-list.php';
  </script>");
  }
else
  {
  echo ("<script LANGUAGE='JavaScript'>
  window.alert('Could not Download $file');
  window.location.href='admin-site-ftp-list.php';
  </script>");
  }
}
// close connection
ftp_close($conn);
?>