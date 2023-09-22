<?php
session_start();
include_once '../dir/dir_0.php';
$link = new PMenu();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>First National Bank | Record box visit </title>

    <link href="../css/signup.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body class="bg-1">

    <div class="header-bg-1">
        <h1>Record box visit</h1>
    </div>

    <!-- Message -->
    <div class="container-0">
        <?php
        if (isset($_SESSION["msg"])) {
            echo '<div><h1 style="text-align: center; padding:15px 0 10px 0; 
            background-color: #fb3e3e; color: white; font-size: 15px">
            <i class="uil uil-exclamation-triangle"></i> | ' . $_SESSION["msg"] . '</h1></div>';
        }
        unset($_SESSION['msg']);
        ?>
    </div>

    <div class="container">
        <div class="profile max-wid-360 pad-10-0 bg-white-1 bord-rad-10">
            <div class="section grid-col-1">
                <div>
                    <div class="mid-sec-2 no-marg-bord pad-bottom-5">
                        <form method="post">
                            <button type="submit" class="btn bg-white color-black no-marg-bord" style="color: black;" name="home">Back to Home</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- form start -->
    <div class="page-wrapper p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4" style="background: rgb(228, 228, 228, 0.9);">
                <div class="card-body">
                    <!-- <h2 class="title">Sign up</h2> -->
                    <p><i>Field marked with red <b style="color: red;">*</b> sign must fillup</i></p><br><br>
                    <p>Upload file must be jpg format</p><br><br>
                    <form action="#" method="POST" enctype="multipart/form-data">

                        <div class="input-group">
                            <?php
                            $now = date('Y-m-d H:i:s');
                            echo
                            '<label class="label" style="color: black;">| Access date: ' . $now . '</label>';
                            ?>
                        </div>

                        <div class="input-group">
                            <label class="label"><i style="color: red;">*</i> Customer ID: FNB-SDB-</label>
                            <input class="input--style-4" placeholder="number after 'FNB-SDB' code" type="number" name="c_id" required>
                        </div>

                        <div class="input-group">
                            <label class="label"><i style="color: red;">*</i> Box ID</label>
                            <input class="input--style-4" type="number" name="b_id" required>
                        </div>

                        <div class="input-group">
                            <label class="label"><i style="color: red;">*</i> Visitor image</label>
                            <input class="input--style-4" type="file" name="image" required>
                        </div>
                        <div class="input-group">
                            <label class="label"><i style="color: red;">*</i> Visitor signature</label>
                            <input class="input--style-4" type="file" name="sign" required>
                        </div>

                        <div class="p-t-15" style="text-align: center;">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="record">Record box access (visit)</button>
                            <!-- <li class="nav_links_li"><a href="../index.html">Return to home</a></li> -->
                            <!-- <button class="btn btn--radius-2 btn--radius" type="submit">Return to home</button> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- form finish -->

</html>
<!-- end document-->

<?php
if (isset($_POST["home"])) {
    $link->go_home();
}

if (isset($_POST['record'])) {
    include 'connect.php';

    $sql = "SELECT * FROM tbl_user WHERE id = $_POST[c_id]";
    $result = mysqli_query($conn, $sql);
    if (mysqli_fetch_assoc($result) > 0) {
        $sql = "SELECT * FROM tbl_box WHERE box_id = $_POST[b_id] AND box_owner_id = $_POST[c_id]";
        $result = mysqli_query($conn, $sql);
        if (mysqli_fetch_assoc($result) > 0) {
            $sql = "INSERT INTO tbl_box_history (box_id, c_id)
                VALUES ($_POST[b_id], $_POST[c_id])";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                // Upload image and signature
                $name = $_POST["c_id"];

                $target_dir1 = "../upload/visit_image/";
                $target_file1 = $target_dir1 . basename($_FILES["image"]["name"]);
                $imageFileType1 = pathinfo($target_file1, PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir1 . $name . "." . $imageFileType1);

                $target_dir1 = "../upload/visit_sign/";
                $target_file1 = $target_dir1 . basename($_FILES["sign"]["name"]);
                $imageFileType1 = pathinfo($target_file1, PATHINFO_EXTENSION);
                move_uploaded_file($_FILES["sign"]["tmp_name"], $target_dir1 . $name . "." . $imageFileType1);

                $_SESSION["msg"] = 'Recorded box visit. ';
                mysqli_close($conn);
            } else {
                $_SESSION["msg"] = 'Failed to record box access. Try again.';
            }
        } else {
            $_SESSION["msg"] = 'False information. Try again.';
        }
    } else {
        $_SESSION["msg"] = 'User does not exist. Please notify manager.';
    }

    $link->go_recordBoxAccess();
}
?>