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
    <title>First National Bank | Payment</title>

    <link href="../css/signup.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body class="bg-1">

    <div class="header-bg-1">
        <h1>Payment</h1>
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
                            <label class="label"><i style="color: red;">*</i> Box ID</label>
                            <input class="input--style-4" type="number" placeholder="Box ID" name="b_id" required>
                        </div>

                        <!-- <div class="input-group">
                            <label class="label">Payment method</label>
                            <div class="p-t-10 bg-white p-b-10">
                                <label class="radio-container m-r-45">Cash
                                    <input type="radio" checked="checked" name="payment_method" value="cash">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container m-r-45">Bank cheque
                                    <input type="radio" name="payment_method" value="cheque">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Bank cheque number (<i style="color: red;">If paid thorugh bank cheque</i> )</label>
                            <input class="input--style-4" type="number" placeholder="Bank cheque number" name="cheque_number">
                        </div> -->

                        <div class="p-t-15" style="text-align: center;">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="payment">Proceed</button>
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

if (isset($_POST['payment'])) {
    include 'connect.php';

    // $now = date("2023-12-22");
    // $month = (date('m', strtotime($now)) + 1);
    // if ($month == 13) {
    //     $month = 1;
    // }

    $sql = "SELECT * FROM tbl_box WHERE box_id = $_POST[b_id] AND box_owner_id = $_POST[c_id]";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row > 0) {
        $now = date("Y-m-d");
        $year = date('Y', strtotime($now)) + 0; // added 0 to make it Integer
        $month = date('m', strtotime($now)) + 0; // added 0 to make it Integer

        $y = date('Y', strtotime($row['next_bill_date'])) + 0;
        $m = date('m', strtotime($row['next_bill_date'])) + 0;
        $due = ((($year - $y) * 12) + ($month - $m)) + 0;

        $bill_date = date('Y-m-d', strtotime($now . ' + 31 days'));

        if ($due <= 0) {
            $due = 1;
        }

        $_SESSION['data1'] = array($_POST['b_id'], $_POST['c_id'], ($row['box_price'] * $due), $bill_date);
        mysqli_close($conn);
        $link->go_boxPayment2();
    } else {
        $_SESSION["msg"] = 'No data found. Please try again.';
        mysqli_close($conn);
        $link->go_boxPayment1();
    }


    // $sql = "SELECT * FROM tbl_user WHERE id = $_POST[c_id]";
    // $result = mysqli_query($conn, $sql);
    // if (mysqli_fetch_assoc($result) > 0) {

    // } else {
    //     $_SESSION["msg"] = 'User do not exist. Please notify manager.';
    // }




}
?>