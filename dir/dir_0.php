<?php
class PIndex {

    function go_login() {
        echo '<script> window.location.href="index.php"; </script>';
    }

    function go_home() {
        echo '<script> window.location.href="menu/home.php"; </script>';
    }

}

class PMenu {
    function go_login() {
        echo '<script> window.location.href="../index.php"; </script>';
    }

    function go_home() {
        echo '<script> window.location.href="home.php"; </script>';
    }

    function go_assignBox() {
        echo '<script> window.location.href="assign_a_box.php"; </script>';
    }

    function go_boxPayment1(){
        echo '<script> window.location.href="box_payment_1.php"; </script>';
    }
    function go_boxPayment2(){
        echo '<script> window.location.href="box_payment_2.php"; </script>';
    }

    function go_recordBoxAccess(){
        echo '<script> window.location.href="record_box_access.php"; </script>';
    }

    function go_register() {
        echo '<script> window.location.href="register.php"; </script>';
    }

    function go_customerDetails() {
        echo '<script> window.location.href="customer_details.php"; </script>';
    }
    
    function go_mailSend1() {
        echo '<script> window.location.href="../test/i.php"; </script>';
    }
    
    function go_letterManage() {
        echo '<script> window.location.href="../letter/letter_manage.php"; </script>';
        
    }
    function go_letterManage2() {
        echo '<script> window.location.href="../letter/letter_manage_2.php"; </script>';
        
    }

    function go_retainABox() {
        echo '<script> window.location.href="retain_a_box.php"; </script>';
        
    }

    function go_retainACustomer() {
        echo '<script> window.location.href="retain_a_customer.php"; </script>';
        
    }
}

class PLetter{
    
}


?>