<?php
// connect and login to FTP server
require('./List.php');

if(isset($_GET["name"])){
$local_file = $_GET["name"];
$server_file = $_GET["name"];

// download server file
if (ftp_get($ftp_conn, $local_file, $server_file, FTP_ASCII))
  {
  echo "Successfully written to $local_file.";
  }
else
  {
  echo "Error downloading $server_file.";
  }
}
// close connection
ftp_close($ftp_conn);
?>