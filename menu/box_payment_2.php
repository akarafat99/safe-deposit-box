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
                            <label class="label">Customer ID: FNB-SDB-<?php echo $_SESSION['data1'][1]; ?></label>
                        </div>

                        <div class="input-group">
                            <label class="label">Box ID: <?php echo $_SESSION['data1'][0]; ?></label>
                        </div>

                        <div class="input-group">
                            <label class="label">Amount to be paid: <?php echo $_SESSION['data1'][2]; ?> $</label>
                        </div>

                        <div class="input-group">
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
                            <input class="input--style-4" type="number" placeholder="Bank cheque number" name="bank_cheque">
                        </div>

                        <div class="p-t-15" style="text-align: center;">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="payment">Confirm payment</button>
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

    $now = date("Y-m-d");
    $n = date('Y-m-d', strtotime($now . ' + 31 days'));

    $a = $_SESSION['data1'][0];
    $b = $_SESSION['data1'][1];
    $c = $_SESSION['data1'][2];
    $sql = "UPDATE tbl_box 
            SET next_bill_date = '$n' 
            WHERE box_id = $a AND box_owner_id = $b";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sql = "INSERT INTO tbl_box_payment (box_id, box_owner_id, payment_method, bank_cheque, amount)
                VALUES ($a, $b, '$_POST[payment_method]', '$_POST[bank_cheque]', $c)";

        mysqli_query($conn, $sql);

        // TO-DO email system

        unset($_SESSION['data1']);
        $_SESSION["msg"] = 'User ID:' . $b . ' and box ID: '. $a . '. Successful.';
        mysqli_close($conn);
    } else {
        mysqli_close($conn);
        $_SESSION["msg"] = 'Error. Please try again.';
    }
    $link->go_boxPayment1();
}
?>