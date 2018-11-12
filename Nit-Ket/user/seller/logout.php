<?php
session_start();
        unset($_SESSION['itemid']);
        session_destroy();
	header("Location:../../index.php");
     
?>