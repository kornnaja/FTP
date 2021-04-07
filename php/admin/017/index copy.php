<!-- <?php
    require('PHP/Connect.php');

    if(isset($_POST['submit'])){
         

      
        $destination_file = $_FILES['file']['name'];
        $source_file = $_FILES['file']['tmp_name'];
        $size_file=$_FILES['file']['size'];
        
       // $fp = fopen($source_file,"r");
        
        $upload = ftp_put($conn, $destination_file, $source_file, FTP_BINARY);    

        // check upload status  
        if (!$upload) {
            echo `FTP upload has failed!`;
            exit();
        }else{
            echo "สำเร็จ";
        }
    }
?>  -->
<!DOCTYPE html>
<html>
<head>
<title>HOME</title>
<link rel="stylesheet" href="/PHP/style.css">
</head>
<body>
<h1>FTP TIGER</h1>
<br>
<a href="/PHP/List.php">รายละเอียดข้อมูลที่เก็บไว้</a>
<hr width="1500" color="red">

    <h2>Upload File</h2>
        <form  action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <button type="submit" name="submit">upload</button>
    </form>
<br>
    <h3>Create Folder</h3>
    <form  action ="/PHP/mkdir.php" method="post">
        <label for="name"> New Folder: </label><input type="text" name="name"><br><br>
        <input type="submit" value="Create">
    </form>
    
</body>
</html>  