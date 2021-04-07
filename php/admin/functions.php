<?php 

    define('host', 'db');
    define('DB_USER', 'root');
    define('DB_PASS', '1234');
    define('DB_NAME', 'devcorp_db');
    
    class DB_con {

        function __construct() {
            $conn = mysqli_connect(host, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL : " . mysqli_connect_error();
            }
        }

        public function insert($username, $password, $mem_fname, $mem_lname, $email, $mem_tel, $mem_born) {
            $result = mysqli_query($this->dbcon, "INSERT INTO user (username, email, password, member_firstname, member_lastname, member_tel, member_born) VALUES ('$username', '$email', '$password', '$mem_fname', '$mem_lname', '$mem_tel', '$mem_born')");
            return $result;
        }

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM user");
            return $result;
        }

        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM user WHERE id = '$userid'");
            return $result;
        }

        public function update($username, $password, $mem_fname, $mem_lname, $email, $mem_tel, $mem_born, $userid) {
            $result = mysqli_query($this->dbcon, "UPDATE user SET 
                username = '$username',
                email = '$email',
                password = '$password',
                member_firstname = '$mem_fname',
                member_lastname = '$mem_lname',
                member_tel = '$mem_tel',
                member_born = '$mem_born'
                WHERE id = '$userid'
            ");
            return $result;
        }

        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM user WHERE id = '$userid'");
            return $deleterecord;
        }

    }
    

?>