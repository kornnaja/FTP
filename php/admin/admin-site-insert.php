<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: admin-login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header('location: admin-login.php');
}

?>
<?php

include_once('functions.php');

$insertdata = new DB_con();

if (isset($_POST['insert'])) {
    $userid = $_GET['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $mem_fname = $_POST['member_firstname'];
    $mem_lname = $_POST['member_lastname'];
    $email = $_POST['email'];
    $mem_tel = $_POST['member_tel'];
    $mem_born = $_POST['member_born'];

    $sql = $insertdata->insert($username, $password, $mem_fname, $mem_lname, $email, $mem_tel, $mem_born, $userid);

    if ($sql) {
        echo "<script>alert('Record Inserted Successfully!');</script>";
        echo "<script>window.location.href='admin-site-work.php'</script>";
    } else {
        echo "<script>alert('Something went wrong! Please try again!');</script>";
        echo "<script>window.location.href='admin-site-insert.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <link href="./main.css" rel="stylesheet">
    <link href="./login.css" rel="stylesheet">
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input type="text" class="search-input" placeholder="Type to search">
                            <button class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                </div>
                <div class="app-header-right">
                    <!-- <div class="widget-content-left  ml-3 header-user-info">
                        <div class="widget-heading">
                            Alina Mclourd
                        </div>
                        <div class="widget-subheading">
                            VP People Manager
                        </div>
                    </div> -->
                    <?php if (isset($_SESSION['username'])) : ?>
                        <h3 class="widget-heading">Username : <strong><?php echo $_SESSION['username']; ?></strong></h3>
                        <!-- <p><a href="index.php?logout='1'" style="color: white;" class="mb-2 mr-2 btn btn-danger">Logout</a></p> -->

                        <div class="widget-content-right header-user-info ml-3">
                            <p>
                                <a href="index.php?logout='1'" style="color: red;" class="mb-2 mr-2 btn-transition btn btn-outline-danger"><h4 class="widget-heading">Logout</h4></a>
                            </p>
                        </div>
                    <?php endif ?>
                </div>

            </div>
        </div>

        <div class="app-main">
            <div class="app-sidebar sidebar-shadow">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">

                    </div>
                </div>
                <div class="scrollbar-sidebar ps">
                    <div class="app-sidebar__inner">
                        <ul class="vertical-nav-menu metismenu">
                            <li class="app-sidebar__heading">Main Menu</li>
                            <li>
                                <a href="admin-site.php" class="mm-active">
                                    <i class="metismenu-icon pe-7s-rocket"></i>
                                    Home
                                </a>
                            </li>
                            <!-- ----- -->
                            <li class="app-sidebar__heading">Admin Menu</li>

                            <li>
                                <a href="member-site-work.php">
                                    <i class="metismenu-icon pe-7s-display2"></i>
                                    ข้อมูลสมาชิก
                                </a>
                            </li>
                            <!-- ----- -->
                        </ul>
                    </div>
                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                    </div>
                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-users">
                                    </i>
                                </div>
                                <div>Admin Site
                                    <div class="page-title-subheading">สำหรับผู้ดูแลระบบ</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <meta charset="UTF-8">

                            <title>CodePen - Login Form - Modal</title>
                            <style>
                                html {
                                    width: 100%;
                                    height: 100%;
                                }

                                body {
                                    background: linear-gradient(45deg, rgba(66, 183, 245, 0.8) 0%, rgba(66, 245, 189, 0.4) 100%);
                                    color: rgba(0, 0, 0, 0.6);
                                    font-family: "Roboto", sans-serif;
                                    font-size: 14px;
                                    line-height: 1.6em;
                                    -webkit-font-smoothing: antialiased;
                                    -moz-osx-font-smoothing: grayscale;
                                }

                                .overlay,
                                .form-panel.one:before {
                                    position: absolute;
                                    top: 0;
                                    left: 0;
                                    display: none;
                                    background: rgba(0, 0, 0, 0.8);
                                    width: 100%;
                                    height: 100%;
                                }

                                .form {
                                    z-index: 15;
                                    position: relative;
                                    background: #FFFFFF;
                                    width: 600px;
                                    border-radius: 4px;
                                    box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
                                    box-sizing: border-box;
                                    margin: 100px auto 10px;
                                    overflow: hidden;
                                }

                                .form-toggle {
                                    z-index: 10;
                                    position: absolute;
                                    top: 60px;
                                    right: 60px;
                                    background: #FFFFFF;
                                    width: 60px;
                                    height: 60px;
                                    border-radius: 100%;
                                    transform-origin: center;
                                    transform: translate(0, -25%) scale(0);
                                    opacity: 0;
                                    cursor: pointer;
                                    transition: all 0.3s ease;
                                }

                                .form-toggle:before,
                                .form-toggle:after {
                                    content: "";
                                    display: block;
                                    position: absolute;
                                    top: 50%;
                                    left: 50%;
                                    width: 30px;
                                    height: 4px;
                                    background: #4285F4;
                                    transform: translate(-50%, -50%);
                                }

                                .form-toggle:before {
                                    transform: translate(-50%, -50%) rotate(45deg);
                                }

                                .form-toggle:after {
                                    transform: translate(-50%, -50%) rotate(-45deg);
                                }

                                .form-toggle.visible {
                                    transform: translate(0, -25%) scale(1);
                                    opacity: 1;
                                }

                                .form-group {
                                    display: flex;
                                    flex-wrap: wrap;
                                    justify-content: space-between;
                                    margin: 0 0 20px;
                                }

                                .form-group:last-child {
                                    margin: 0;
                                }

                                .form-group label {
                                    display: block;
                                    margin: 0 0 10px;
                                    color: rgba(0, 0, 0, 0.6);
                                    font-size: 12px;
                                    font-weight: 500;
                                    line-height: 1;
                                    text-transform: uppercase;
                                    letter-spacing: 0.2em;
                                }

                                .two .form-group label {
                                    color: #FFFFFF;
                                }

                                .form-group input {
                                    outline: none;
                                    display: block;
                                    background: rgba(0, 0, 0, 0.1);
                                    width: 100%;
                                    border: 0;
                                    border-radius: 4px;
                                    box-sizing: border-box;
                                    padding: 12px 20px;
                                    color: rgba(0, 0, 0, 0.6);
                                    font-family: inherit;
                                    font-size: inherit;
                                    font-weight: 500;
                                    line-height: inherit;
                                    transition: 0.3s ease;
                                }

                                .form-group input:focus {
                                    color: rgba(0, 0, 0, 0.8);
                                }

                                .two .form-group input {
                                    color: #FFFFFF;
                                }

                                .two .form-group input:focus {
                                    color: #FFFFFF;
                                }

                                .form-group button {
                                    outline: none;
                                    background: #4285F4;
                                    width: 100%;
                                    border: 0;
                                    border-radius: 4px;
                                    padding: 12px 20px;
                                    color: #FFFFFF;
                                    font-family: inherit;
                                    font-size: inherit;
                                    font-weight: 500;
                                    line-height: inherit;
                                    text-transform: uppercase;
                                    cursor: pointer;
                                }

                                .two .form-group button {
                                    background: #FFFFFF;
                                    color: #4285F4;
                                }

                                .form-group .form-remember {
                                    font-size: 12px;
                                    font-weight: 400;
                                    letter-spacing: 0;
                                    text-transform: none;
                                }

                                .form-group .form-remember input[type=checkbox] {
                                    display: inline-block;
                                    width: auto;
                                    margin: 0 10px 0 0;
                                }

                                .form-group .form-recovery {
                                    color: #4285F4;
                                    font-size: 12px;
                                    text-decoration: none;
                                }

                                .form-panel {
                                    padding: 60px calc(5% + 60px) 60px 60px;
                                    box-sizing: border-box;
                                }

                                .form-panel.one:before {
                                    content: "";
                                    display: block;
                                    opacity: 0;
                                    visibility: hidden;
                                    transition: 0.3s ease;
                                }

                                .form-panel.one.hidden:before {
                                    display: block;
                                    opacity: 1;
                                    visibility: visible;
                                }

                                .form-panel.two {
                                    z-index: 5;
                                    position: absolute;
                                    top: 0;
                                    left: 95%;
                                    background: #4285F4;
                                    width: 100%;
                                    min-height: 100%;
                                    padding: 60px calc(10% + 60px) 60px 60px;
                                    transition: 0.3s ease;
                                    cursor: pointer;
                                }

                                .form-panel.two:before,
                                .form-panel.two:after {
                                    content: "";
                                    display: block;
                                    position: absolute;
                                    top: 60px;
                                    left: 1.5%;
                                    background: rgba(255, 255, 255, 0.2);
                                    height: 30px;
                                    width: 2px;
                                    transition: 0.3s ease;
                                }

                                .form-panel.two:after {
                                    left: 3%;
                                }

                                .form-panel.two:hover {
                                    left: 93%;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                                }

                                .form-panel.two:hover:before,
                                .form-panel.two:hover:after {
                                    opacity: 0;
                                }

                                .form-panel.two.active {
                                    left: 10%;
                                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                                    cursor: default;
                                }

                                .form-panel.two.active:before,
                                .form-panel.two.active:after {
                                    opacity: 0;
                                }

                                .form-header {
                                    margin: 0 0 40px;
                                }

                                .form-header h1 {
                                    padding: 4px 0;
                                    color: #4285F4;
                                    font-size: 24px;
                                    font-weight: 700;
                                    text-transform: uppercase;
                                }

                                .two .form-header h1 {
                                    position: relative;
                                    z-index: 40;
                                    color: #FFFFFF;
                                }

                                .pen-footer {
                                    display: flex;
                                    flex-direction: row;
                                    justify-content: space-between;
                                    width: 600px;
                                    margin: 20px auto 100px;
                                }

                                .pen-footer a {
                                    color: #FFFFFF;
                                    font-size: 12px;
                                    text-decoration: none;
                                    text-shadow: 1px 2px 0 rgba(0, 0, 0, 0.1);
                                }

                                .pen-footer a .material-icons {
                                    width: 12px;
                                    margin: 0 5px;
                                    vertical-align: middle;
                                    font-size: 12px;
                                }

                                .cp-fab {
                                    background: #FFFFFF !important;
                                    color: #4285F4 !important;
                                }
                            </style>

                            <script>
                                window.console = window.console || function(t) {};
                            </script>

                            <script>
                                if (document.location.search.match(/type=embed/gi)) {
                                    window.parent.postMessage("resize", "*");
                                }
                            </script>

                            <!-- Head -->
                            <!-- <div class="content">
                                <!-- notification message -->
                            <?php if (isset($_SESSION['success'])) : ?>
                                <div class="error success">
                                    <h3>
                                        <?php
                                        echo $_SESSION['success'];
                                        unset($_SESSION['success']);
                                        ?>
                                    </h3>
                                </div>
                            <?php endif ?> -->


                            <!-- Form-->
                            <!-- logged in user information -->
                            <!-- <?php if (isset($_SESSION['username'])) : ?>
                                    <h4>
                                        <p>Welcome Username : <strong><?php echo $_SESSION['username']; ?></strong></p>
                                    </h4>
                                    <h4>
                                        <p>Welcome คุณ : <strong><?php echo $mem_fname; ?></strong></p>
                                    </h4>
                                    <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
                                <?php endif ?> -->






                            <!-- Working Space -->
                            <div class="main-card mb-3 card">
                                <div class="container">
                                    <hr>
                                    <a href="admin-site-work.php" class="btn btn-primary mt-3">Go Back</a>
                                    <hr>
                                    <h1 class="mt-5">เพิ่มข้อมูลสมาชิก</h1>
                                    <hr>
                                    <table class="mb-0 table table-dark">
                                        <form action="" method="post">
                                            <!-- <div class="main-card mb-3 card">
                                            <div class="input-group">
                                                <div class="input-group-prepend"><span class="input-group-text">username</span></div><br>
                                                <input placeholder="username" type="text" class="form-control">
                                            </div>
                                        </div> -->
                                            <div class="main-card mb-3 card">
                                                <div class="mb-3">
                                                    <label for="username" class="form-label">Username</label>
                                                    <input type="text" placeholder="Enter Text" class="form-control" name="username" value="<?php echo $row['username']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="main-card mb-3 card">
                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Password</label>
                                                    <input type="text" placeholder="Enter Text" class="form-control" name="password" value="<?php echo $row['password']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="main-card mb-3 card">
                                                <div class="mb-3">
                                                    <label for="member_firstname" class="form-label">First name</label>
                                                    <input type="text" placeholder="Enter Text" class="form-control" name="member_firstname" value="<?php echo $row['member_firstname']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="main-card mb-3 card">
                                                <div class="mb-3">
                                                    <label for="member_lastname" class="form-label">Last name</label>
                                                    <input type="text" placeholder="Enter Text" class="form-control" name="member_lastname" value="<?php echo $row['member_lastname']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="main-card mb-3 card">
                                                <div class="mb-3">
                                                    <label for="email">Email</label>
                                                    <input type="email" placeholder="Enter Text" class="form-control" name="email" value="<?php echo $row['email']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="main-card mb-3 card">
                                                <div class="mb-3">
                                                    <label for="member_tel">Phone Number</label>
                                                    <input type="text" placeholder="Enter Text" class="form-control" name="member_tel" value="<?php echo $row['member_tel']; ?>" required>
                                                </div>
                                            </div>
                                            <div class="main-card mb-3 card">
                                                <div class="mb-3">
                                                    <label for="member_born">วันเกิด</label>
                                                    <input type="date" placeholder="Enter Text" class="form-control" name="member_born" value="<?php echo $row['member_born']; ?>" required>
                                                </div>
                                            </div>
                                            <button type="submit" name="insert" class="btn btn-success">
                                                <h3> เพิ่มข้อมูล </h3>
                                            </button>
                                        </form>
                                    </table>
                                </div>
                                <hr>
                                <hr>
                            </div>



                            <div class="col-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript" src="./assets/scripts/main.js"></script>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</body>

</html>