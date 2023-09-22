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
    <title>First National Bank | Assign a box</title>

    <link href="../css/signup.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body class="bg-1">

    <div class="header-bg-1">
        <h1>Assign a box</h1>
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
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="input-group">
                            <label class="label"><i style="color: red;">*</i> Customer ID: FNB-SDB-</label>
                            <input class="input--style-4" type="number" placeholder="number after 'FNB-SDB' code" name="c_id" required>
                        </div>

                        <div class="input-group">
                            <label class="label">Description</label>
                            <input class="input--style-4" type="text" name="description">
                        </div>

                        <div class="input-group">
                            <label class="label"><i style="color: red;">*</i> Box size (inches)</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="box_price">
                                    <!-- <option disabled="disabled" selected="selected" value="None">Choose option</option> -->
                                    <option value="0">3 x 5</option>
                                    <option value="1">5 x 5</option>
                                    <option value="2">3 x 10</option>
                                    <option value="3">5 x 10</option>
                                    <option value="4">10 x 10</option>
                                    <option value="5">15 x 10</option>
                                    <option value="6">13 x 21</option>
                                    <option value="7">26 x 21</option>
                                    <option value="8">38 x 21</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div style="text-align: center; padding:0;">
                            <button class="btn btn--radius-2 btn--blue" style="margin: 0;" type="submit" name="assign">Assign box</button>
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

if (isset($_POST['assign'])) {
    include 'connect.php';
    $price = array(10, 25, 30, 40, 70, 125, 350, 600, 1000);
    $var = $price[$_POST['box_price']];

    $now = date("Y-m-d");
    // $now = date("2023-12-22");
    // $month = (date('m', strtotime($now)) + 1);
    // if ($month == 13) {
    //     $month = 1;
    // }

    $bill_date = date('Y-m-d', strtotime($now . ' + 31 days'));

    $sql = "SELECT * FROM tbl_user WHERE id = $_POST[c_id]";
    $result = mysqli_query($conn, $sql);
    if (mysqli_fetch_assoc($result) > 0) {
        $sql = "INSERT INTO tbl_box (box_owner_id, box_description, box_price, next_bill_date, status)
            VALUES ($_POST[c_id], '$_POST[description]', $var, '$now', 1)";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $sql = "SELECT box_id FROM tbl_box WHERE box_owner_id = $_POST[c_id]";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_all($result);

            $new_box = $row[sizeof($row) - 1][0];

            $_SESSION["msg"] = 'Box assigned - ' . $new_box;

            $_SESSION['data1'] = array($new_box, $_POST['c_id'], $var, $bill_date);
            mysqli_close($conn);
            $link->go_boxPayment2();
        } else {
            $_SESSION["msg"] = 'Box assign failed.';
            mysqli_close($conn);
            $link->go_assignBox();
        }
    } else {
        $_SESSION["msg"] = 'Customer does not exist. Please notify manager and customer.';
        mysqli_close($conn);
        $link->go_assignBox();
    }


    // $sql = "SELECT * FROM tbl_user WHERE id = $_POST[c_id]";
    // $result = mysqli_query($conn, $sql);
    // if (mysqli_fetch_assoc($result) > 0) {

    // } else {
    //     $_SESSION["msg"] = 'User do not exist. Please notify manager.';
    // }




}
?>