<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print</title>

    <link rel="stylesheet" href="../css/letter.css">
</head>

<body>
    <!-- Add a button to your HTML page -->
    <div class="btn-print">
        <button id="print-button" class="btn">Print</button>
    </div>

    <!-- Add the element that you want to print, but hide it using CSS -->
    <div id="print-element">
        <div class="sec-1">
            <?php
            echo '
                <p>To: '. $_SESSION['t_full_name'][$_POST["print"]].'</p>
                <p>Address: '. $_SESSION['t_address'][$_POST["print"]].'</p>
                <p>Subject: Pre-reminder of box (box ID:'. $_SESSION['t_box_id'][$_POST["print"]].' ) validity expiration</p>
                <p>Dear customer,</p>
                <p>This letter is to remind you that your box validity has been expired.
                    Please pay '. $_SESSION['t_box_id'][$_POST["print"]] .'$ for uninterrupted service. Thank you.</p>';
            ?>


            <p><br>Regards,</p>
            <p>First National Bank</p>
            <p><i>Jashore-1011, Khulna, Bangladesh.</i></p>
        </div>
    </div>

    <div id="print-alert" style="visibility: hidden; text-align: center;">
        <div class="sec-1">
            <h1>Close this tab</h1>
        </div>
    </div>


    <script>
        // Add a click event listener to the print button
        document.getElementById("print-button").addEventListener("click", function() {
            // Hide the print element again
            document.getElementById("print-button").style.visibility = "hidden";
            
            // Print the element
            window.print();
            
            document.getElementById("print-element").style.display = "none";
            document.getElementById("print-alert").style.visibility = "visible";

        });
    </script>
</body>

</html>