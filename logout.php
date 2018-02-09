<?php
	session_start();
        unset ( $_SESSION['UserID'] );
        unset ( $_SESSION['Username'] );
        unset ( $_SESSION['status'] );
	session_destroy();
	header("location:login.php");
?>