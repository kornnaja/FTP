<?php

$ftp_username = "Tora";
$ftp_userpass = 1234;

// connect to FTP server      
$ftp_server = "172.28.192.1";
$conn = ftp_connect($ftp_server,21) or die("not connection.");
$ftp_login=ftp_login($conn, $ftp_username, $ftp_userpass);
ftp_pasv($conn,TRUE);

if((!$conn) || (!$ftp_login)){
  echo "ไม่สามารถเชื่อมต่อ FTP server ได้";
  exit();
}else{
  echo "เชื่อมต่อสำเร็จ..";
}
?>