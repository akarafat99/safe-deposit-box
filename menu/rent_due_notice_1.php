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
    <title>First National Bank | Notice</title>

    <link href="../css/signup.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body class="bg-1">

    <div class="header-bg-1">
        <h1>Rent due notice (Pre-reminder)</h1>
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


    <div class="grid-4">
        <!-- form start -->
        <div class="page-wrapper p-t-130 p-b-100 font-poppins" style="min-height: auto;">
            <div class="wrapper wrapper--w680">
                <div class="card card-4" style="background: rgb(228, 228, 228, 0.9);">
                    <div class="card-body">
                        <h2 class="title">Email</h2>
                        <!-- <p><i>Field marked with red <b style="color: red;">*</b> sign must fillup</i></p><br><br> -->
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="input-group">
                                <?php
                                include 'connect.php';

                                $now = date("Y-m-d");
                                $year = date('Y', strtotime($now)) + 0; // added 0 to make it Integer
                                $month = date('m', strtotime($now)) + 0; // added 0 to make it Integer

                                $sql = "SELECT * FROM tbl_box WHERE status = 1";
                                $result = mysqli_query($conn, $sql);

                                $box1 = array();
                                $price1 = array();
                                $u_id1 = array();
                                $email1 = array();
                                $full_name1 = array();
                                $address1 = array();

                                $found = 0;
                                $no_email = 0;
                                while ($row2 = mysqli_fetch_assoc($result)) {
                                    $y = date('Y', strtotime($row2['next_bill_date'])) + 0;
                                    $m = date('m', strtotime($row2['next_bill_date'])) + 0;
                                    $due = (($year - $y) * 12) + ($month - $m);

                                    if ($due == 0) {
                                        $found = $found + 1;
                                        array_push($box1, $row2['box_id']);
                                        array_push($price1, ($row2['box_price']));
                                        // echo ($row2['box_price'] * $due) . '<br>';
                                        array_push($u_id1, $row2['box_owner_id']);

                                        $sql1 = "SELECT * from tbl_user WHERE id = $row2[box_owner_id]";
                                        $result1 = mysqli_query($conn, $sql1);
                                        $data1 = mysqli_fetch_assoc($result1);
                                        array_push($full_name1, $data1['full_name']);
                                        if ($data1['email'] == '') {
                                            $no_email = $no_email + 1;
                                            array_push($email1, "0");
                                            array_push($address1, $data1['address']);
                                        } else {
                                            array_push($email1, $data1['email']);
                                        }
                                    } 
                                }
                                // echo $id . '<br>';
                                $_SESSION['t_box_id'] = $box1;
                                $_SESSION['t_box_price'] = $price1;
                                $_SESSION['t_box_owner_id'] = $u_id1;
                                $_SESSION['t_email'] = $email1;
                                $_SESSION['t_full_name'] = $full_name1;
                                $_SESSION['t_address'] = $address1;
                                $_SESSION['no_email'] = $no_email;
                                // echo $month + 0;


                                echo
                                '<label style="color: black; font-size: 18px;">
                                Total <blank style="font-size: 30px; font-weight: bolder;">' . ($found - $no_email) . '</blank> 
                                customer\'s box will expire after this month.<br>Send pre reminder email.</label>';
                                echo '</div>';
                                if ($found != 0) {
                                    echo '
                        <div style="text-align: center;">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="send_mail">Send mail</button>
                        </div>';
                                } else {
                                    echo '<label style="color: black; font-size: 18px;">No pending email to send.</label>';
                                }
                                ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- form finish -->

        <!-- form start -->
        <div class="page-wrapper p-t-130 p-b-100 font-poppins" style="min-height: auto;">
            <div class="wrapper wrapper--w680">
                <div class="card card-4" style="background: rgb(228, 228, 228, 0.9);">
                    <div class="card-body">
                        <h2 class="title">Letter</h2>
                        <!-- <p><i>Field marked with red <b style="color: red;">*</b> sign must fillup</i></p><br><br> -->
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="input-group">
                                <?php
                                echo
                                '<label style="color: black; font-size: 18px;">
                                Total <blank style="font-size: 30px; font-weight: bolder;">' . $no_email . '</blank> 
                                customer\'s box will expire after this month.<br>Send pre reminder letter.</label>';
                                echo '</div>';
                                if ($no_email != 0) {
                                    echo '
                        <div style="text-align: center;">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="send_letter">Send letter</button>
                        </div>';
                                } else {
                                    echo '<label style="color: black; font-size: 18px;">No pending letter to send.</label>';
                                }
                                ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- form finish -->
    </div>



</html>
<!-- end document-->

<?php
if (isset($_POST["home"])) {
    $link->go_home();
}

if (isset($_POST['send_mail'])) {
    $_SESSION['newprepost'] = 1;
    $link->go_mailSend1();

    // include 'connect.php';

    // $now = date("Y-m-d");
    // $year = date('Y', strtotime($now)) + 0; // added 0 to make it Integer
    // $month = date('m', strtotime($now)) + 0; // added 0 to make it Integer
    // // echo $year;
    // // echo $month + 0;
    // $sql = "SELECT * FROM tbl_box WHERE status = 1 AND next_bill_month != $month";
    // $result = mysqli_query($conn, $sql);

    // $box1 = array();
    // $price1 = array();
    // $u_id1 = array();
    // $email1 = array();
    // $address1 = array();

    // // $row2 = mysqli_num_rows($result);
    // while ($row2 = mysqli_fetch_assoc($result)) {
    //     $y = date('Y', strtotime($row2['next_bill_date'])) + 0;
    //     $m = date('m', strtotime($row2['next_bill_date'])) + 0;
    //     $due = (($year - $y) * 12) + ($month - $m);

    //     echo $due . ' - ';

    //     array_push($box1, $row2['box_id']);
    //     array_push($price1, ($row2['box_price'] * $due));
    //     echo ($row2['box_price'] * $due) . '<br>';
    //     array_push($u_id1, $row2['box_owner_id']);

    //     $sql1 = "SELECT * from tbl_user WHERE id = $row2[box_owner_id]";
    //     $result1 = mysqli_query($conn, $sql1);
    //     $data1 = mysqli_fetch_assoc($result1);
    //     if ($data1['email'] == '') {
    //         // echo $data1['address'] . ' - <br>';
    //         array_push($email1, "0");
    //         array_push($address1, $data1['address']);
    //     } else {
    //         // echo "YES " . $data1['email'] . '<br>';
    //         array_push($email1, $data1['email']);
    //     }
    // }
    // // echo $id . '<br>';
    // $_SESSION['t_box_id'] = $box1;
    // $_SESSION['t_box_price'] = $price1;
    // $_SESSION['t_box_owner_id'] = $u_id1;
    // $_SESSION['t_email'] = $email1;
    // $_SESSION['t_address'] = $address1;

    // echo '<script> window.location.href="http://localhost/sdb/menu/del1.php"; </script>';
    // echo '<script> window.location.href="http://localhost/sdb/menu/rent_due_notice_1.php"; </script>';
}

if(isset($_POST['send_letter'])) {
    $link->go_letterManage();
}
?>