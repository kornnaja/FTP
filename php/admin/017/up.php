<html>
<body>
<h2>upload file</h2>
        <form  action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <button type="submit" name="submit">upload</button>
    </form>
<?php
if(isset($_POST['submit'])){
         
    $destination_file = $_FILES['file']['name'];
    $source_file = $_FILES['file']['tmp_name'];
    $size_file=$_FILES['file']['size'];

$ftp_username = "Tora";
$ftp_userpass = 1234;
// connect and login to FTP server
$ftp_server = "10.30.174.20";
$ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
$login = ftp_login($ftp_conn, $ftp_username, $ftp_userpass);

// upload file
if (ftp_put($ftp_conn, $destination_file, $source_file, FTP_BINARY))
  {
  echo "Successfully uploaded $file.";
  }
else
  {
  echo "Error uploading $file.";
  }

// close connection
ftp_close($ftp_conn);
}
?>
</body>
</html>