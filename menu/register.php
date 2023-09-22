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
    <title>First National Bank | Register customer</title>

    <link href="../css/signup.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body class="bg-1">


    <div class="header-bg-1">
        <h1>Account create form</h1>
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div>
                            <p style="margin-bottom: 10px;">Section 1 - Account owner info</p>
                        </div>

                        <div class="input-group">
                            <label class="label"><i style="color: red;">*</i> Full name</label>
                            <input class="input--style-4" type="text" name="full_name" required>
                        </div>

                        <div class="input-group">
                            <label class="label">Firm name</label>
                            <input class="input--style-4" type="text" name="firm_name">
                        </div>

                        <div class="input-group">
                            <label class="label"><i style="color: red;">*</i> Address</label>
                            <input class="input--style-4" type="text" name="address" required>
                        </div>

                        <div class="input-group">
                            <label class="label"><i style="color: red;">*</i> Phone Number</label>
                            <input class="input--style-4" type="number" type="tel" name="phone" maxlength="11" required>
                        </div>

                        <div class="input-group">
                            <label class="label">Hair color</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="hair_color">
                                    <!-- <option disabled="disabled" selected="selected" value="None">Choose option</option> -->
                                    <option>Black</option>
                                    <option>Brown</option>
                                    <option>White</option>
                                    <option>Other</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Eye color</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="eye_color">
                                    <!-- <option disabled="disabled" selected="selected" value="None">Choose option</option> -->
                                    <option>Black</option>
                                    <option>Brown</option>
                                    <option>Other</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label"><i style="color: red;">*</i> Gender</label>
                            <div class="p-t-10">
                                <label class="radio-container m-r-45">Male
                                    <input type="radio" checked="checked" name="gender" value="Male">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Female
                                    <input type="radio" name="gender" value="Female">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Other
                                    <input type="radio" name="gender" value="Other">
                                    <span class="checkmark"></span>
                                </label>
                                <!-- <label class="radio-container m-r-45">Female
                                    <input type="radio" checked="checked" name="gender">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container m-r-45">Other
                                    <input type="radio" checked="checked" name="gender">
                                    <span class="checkmark"></span>
                                </label> -->

                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Profession</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="profession">
                                    <!-- <option disabled="disabled" selected="selected" value="None">Choose option</option> -->
                                    <option>-</option>
                                    <option>Tutor</option>
                                    <option>Businessman</option>
                                    <option>Housewife</option>
                                    <option>Electrician</option>
                                    <option>Plumber</option>
                                    <option>Student</option>
                                    <option>Mechanics</option>
                                    <option>Computer technician</option>
                                    <option>Others</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>

                        <div class="input-group">
                            <label class="label">Height (in cm)</label>
                            <input class="input--style-4" type="number" type="tel" name="height">
                        </div>

                        <div class="input-group">
                            <label class="label">Weight (in kg)</label>
                            <input class="input--style-4" type="number" type="tel" name="weight">
                        </div>

                        <div class="input-group">
                            <label class="label">Email</label>
                            <input class="input--style-4" type="email" name="email">
                        </div>

                        <div class="input-group">
                            <label class="label"><i style="color: red;">*</i> Password</label>
                            <p>-Include a capital letter alphabet, a number and minimum of 6 character length</p>
                            <input title="Password must contain at least 6 characters, including UPPER/lowercase and numbers" class="input--style-4" type="password" name="password" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}">
                            <!-- May require for further Op
                                https://www.the-art-of-web.com/javascript/validate-password/?hilite=%7Bwords%7D 
                            -->
                        </div>

                        <div class="input-group">
                            <label class="label">Customer image</label>
                            <input class="input--style-4" type="file" name="image">
                        </div>

                        <div class="input-group">
                            <label class="label">Customer signature</label>
                            <input class="input--style-4" type="file" name="sign">
                        </div>

                        <div>
                            <span style="display:inline-block; height: 20px;"></span>
                            <p style="margin-bottom: 10px;">Section 2 - Power of attorney</p>
                        </div>

                        <div class="input-group">
                            <label class="label">Email of nominee</label>
                            <input class="input--style-4" type="email" name="n_email">
                        </div>
                        <div class="input-group">
                            <label class="label">Full name of nominee</label>
                            <input class="input--style-4" type="text" name="n_full_name">
                        </div>
                        <div class="input-group">
                            <label class="label">Phone Number of nominee</label>
                            <input class="input--style-4" type="number" type="tel" name="n_phone" maxlength="11">
                        </div>
                        <div class="input-group">
                            <label class="label">Address of nominee</label>
                            <input class="input--style-4" type="text" name="n_address">
                        </div>

                        <div class="input-group">
                            <label class="label">Customer image</label>
                            <input class="input--style-4" type="file" name="n_image">
                        </div>

                        <div class="input-group">
                            <label class="label">Customer signature</label>
                            <input class="input--style-4" type="file" name="n_sign">
                        </div>



                        <div class="p-t-15" style="text-align: center;">
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="create">Create account</button>
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
 
if (isset($_POST['create'])) {
    include 'connect.php';

    $sql = "SELECT * FROM tbl_user WHERE contact = '$_POST[phone]'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $_SESSION["msg"] = 'Account already available using contact ' . $_POST["phone"];
        mysqli_close($conn);
        $link->go_register();
    } else {
        $sql = "INSERT INTO tbl_user(email, full_name, firm_name, password, contact, address, gender, profession, hair_color, eye_color, height, weight, approved, n_full_name, n_email, n_contact, n_address)
        VALUES ('$_POST[email]', '$_POST[full_name]', '$_POST[firm_name]', '$_POST[password]', 
        '$_POST[phone]', '$_POST[address]', '$_POST[gender]', 
        '$_POST[profession]', '$_POST[hair_color]', '$_POST[eye_color]', 
        '$_POST[height]', '$_POST[weight]', 0, '$_POST[n_full_name]', '$_POST[n_email]', 
        '$_POST[n_phone]', '$_POST[n_address]')";

        if (mysqli_query($conn, $sql)) {
            // Image and signature process

            echo $_FILES["image"]["name"] . '<br>';

            $name = $_POST["phone"];
            $target_dir1 = "../upload/image/";
            $target_file1 = $target_dir1 . basename($_FILES["image"]["name"]);
            $imageFileType1 = pathinfo($target_file1, PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir1 . $name . "." . $imageFileType1);

            $target_dir1 = "../upload/sign/";
            $target_file1 = $target_dir1 . basename($_FILES["sign"]["name"]);
            $imageFileType1 = pathinfo($target_file1, PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["sign"]["tmp_name"], $target_dir1 . $name . "." . $imageFileType1);

            $target_dir1 = "../upload/image/";
            $target_file1 = $target_dir1 . basename($_FILES["n_image"]["name"]);
            $imageFileType1 = pathinfo($target_file1, PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["n_image"]["tmp_name"], $target_dir1 . "n_" . $name . "." . $imageFileType1);

            $target_dir1 = "../upload/sign/";
            $target_file1 = $target_dir1 . basename($_FILES["n_sign"]["name"]);
            $imageFileType1 = pathinfo($target_file1, PATHINFO_EXTENSION);
            move_uploaded_file($_FILES["n_sign"]["tmp_name"], $target_dir1 . "n_" . $name . "." . $imageFileType1);

            $_SESSION['c_id'] = $_POST['phone'];
            $_SESSION["msg"] = 'Account create successful.';
            mysqli_close($conn);
            $link->go_customerDetails();
        } else {
            echo "Error" . $sql;
            mysqli_close($conn);
            $link->go_customerDetails();
        }
    }
}
?>