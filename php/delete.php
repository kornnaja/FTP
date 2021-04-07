<?php
session_start();
require('./017/PHP/Connect.php');

if(isset($_GET['name'])){
    $file = $_GET['name'];

if (ftp_delete($conn, $file))
  {
  echo ("<script LANGUAGE='JavaScript'>
    window.alert('$file deleted');
    window.location.href='member-site-ftp-list.php';
    </script>");
  }
else
  {
  echo ("<script LANGUAGE='JavaScript'>
  window.alert('Could not delete $file');
  window.location.href='member-site-ftp-list.php';
  </script>");
  }
}
// close connection
ftp_close($conn);
?>