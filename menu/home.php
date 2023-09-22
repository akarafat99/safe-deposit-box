<?php
session_start();
include_once '../dir/dir_0.php';
$link = new PMenu();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>First National Bank | Dashboard</title>
</head>

<body class="bg-1">

    <div class="header-bg-1">
        <h1>First National bank | Safe deposit box</h1>
    </div>

    <!-- Nav Bar 0 -->
    <div class="container">
        <div class="profile pad-10-0 bg-white-1 bord-rad-10">
            <div class="section grid-col-1">
                <div>
                    <div class="mid-sec-2 no-marg-bord m-t-10">
                        <form method="post">
                            <button type="submit" class="btn bg-red color-white no-marg-bord" name="logout">Log out</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Nav Bar 1 -->
    <div class="container m-t-50">
        <div class="profile pad-10-0 bg-white-1 bord-rad-10">
            <div class="section grid-3">
                <div class="mid-sec-2 m-t-20">
                    <a href="register.php" class="btn bg-white color-black no-marg-bord" name="register">Register a customer</a>
                </div>
                <div class="mid-sec-2 m-t-20">
                    <a href="assign_a_box.php" class="btn bg-white color-black no-marg-bord" name="register">Assign a box</a>
                    <!-- <a href="del1.php" class="btn bg-white color-black no-marg-bord" name="register">Assign a box</a> -->
                </div>
                <div class="mid-sec-2 m-t-20">
                    <a href="retain_a_box.php" class="btn bg-white color-black no-marg-bord" name="register">Retain a box</a>
                </div>
                <div class="mid-sec-2 m-t-20">
                    <a href="record_box_access.php" class="btn bg-white color-black no-marg-bord" name="register">Record box visit</a>
                </div>
                <div class="mid-sec-2 m-t-20">
                    <a href="retain_a_customer.php" class="btn bg-white color-black no-marg-bord" name="register">Retain a customer</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Nav Bar 1 -->
    <div class="container m-t-50">
        <div class="profile pad-10-0 bg-white-1 bord-rad-10">
            <div class="section grid-3">
                <div class="mid-sec-2 m-t-20">
                    <a href="rent_due_notice_1.php" target="self" class="btn bg-white color-black no-marg-bord" name="register">Rent due notice (Pre-reminder)</a>
                </div>
                <div class="mid-sec-2 m-t-20">
                    <a href="rent_due_notice_2.php" class="btn bg-white color-black no-marg-bord" name="register">Rent due notice (Post-reminder)</a>
                </div>
                <div class="mid-sec-2 m-t-20">
                    <a href="box_payment_1.php" class="btn bg-white color-black no-marg-bord" name="register">Box payment</a>
                </div>
            </div>
        </div>
    </div>

    <!-- start of footer -->
    <div class="footer-2">
        <p>Copyright
            <script>
                document.write(new Date().getFullYear())
            </script> &copy; <a href="#" class="col-white"> First National bank</a>
        </p>
    </div>
    <!-- End of Footer-->
</body>

</html>

<?php
if (isset($_POST['logout'])) {
    session_destroy();
    $link->go_login();
}

?>