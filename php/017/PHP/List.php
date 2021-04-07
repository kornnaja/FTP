<html>
  <head>
  <title>LIST</title>
</head>
<body>
  <a href="../index.php">หน้าหลัก</a>
<br>
<br>
<?php
require('Connect.php');
echo "<br/>";

$mode = ftp_pasv($conn, TRUE);

//Login OK ?
if ((!$conn) || (!$ftp_login) || (!$mode)) {
  die("FTP connection has failed !");
}
echo "<br/>Login Ok.<br/>";
echo "<br/>if Size = -1 bytes is folder.<br/> ";

?>

<table border="1">
  <thead>
    <tr>
      <th>No.</th>
      <th>Name</th>
      <th>Size(bytes)</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $file_list = ftp_nlist($conn,".");
    $i = 0;
    foreach ($file_list as $file) {
      $fsize = ftp_size($conn, $file);
    ?>
      <tr>
        <td><?= $i+1 ?></td>
        <td><?= $file ?></td>
        <td><?= $fsize ?></td>
        <td>
          <a href="delete.php?name=<?= $file ?>">delete</a>
        </td>
      </tr>
    <?php
    $i++; 
    }
    ?>
  </tbody>
</table>
<?php

//close
ftp_close($conn); 
?>
</body>
</html>