<?php 
    session_start();
    include('server.php');
    
    $errors = array();

    if (isset($_POST['reg_user'])) {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        $mem_fname = mysqli_real_escape_string($conn, $_POST['member_firstname']);
        $mem_lname = mysqli_real_escape_string($conn, $_POST['member_lastname']);
        $mem_tel = mysqli_real_escape_string($conn, $_POST['member_tel']);
        $mem_born = mysqli_real_escape_string($conn, $_POST['member_born']);

        if (empty($username)) {
            array_push($errors, "Username is required");
            $_SESSION['error'] = "Username is required";
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
            $_SESSION['error'] = "Email is required";
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
            $_SESSION['error'] = "Password is required";
        }
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
            $_SESSION['error'] = "The two passwords do not match";
        }

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR email = '$email' LIMIT 1";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            if ($result['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }

        if (count($errors) == 0) {
            $password = md5($password_1);

            $sql = "INSERT INTO user (username, email, password, member_firstname, member_lastname, member_tel, member_born) VALUES ('$username', '$email', '$password', '$mem_fname', '$mem_lname', '$mem_tel', '$mem_born')";
            mysqli_query($conn, $sql);

            $_SESSION['username'] = $username;
            $_SESSION['member_firstname'] = $mem_fname;
            $_SESSION['member_lastname'] = $mem_lname;
            $_SESSION['success'] = "You are now logged in";
            header('location: member-site.php');
        } else {
            header("location: member-register.php");
        }
    }

?>
