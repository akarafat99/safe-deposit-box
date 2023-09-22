<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>First National Bank | Notice through letter</title>

    <link href="../css/signup.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/letter.css">

</head>

<body class="bg-1">

    <div class="header-bg-1">
        <h1>Rent due notice through letter (Post-reminder)</h1>
    </div>

    <div>
        <table>
            <tr>
                <td>Box ID</td>
                <td>Due amount</td>
                <td></td>
            </tr>

            <?php
            for ($i = 0; $i < $_SESSION['no_email']; $i++) {
                echo '
                <tr>
                    <td>'.$_SESSION["t_box_id"][$i].'</td>
                    <td>'.$_SESSION["t_box_price"][$i].'</td>
                    <td>
                        <form action="letter_2.php" method="POST" target="_blank">
                            <button type="submit" class="btn-x" name="print" value="'. $i .'">Print letter</button></td>
                        </form>
                </tr>';
            }
            ?>

        </table>
    </div>

</html>
<!-- end document-->