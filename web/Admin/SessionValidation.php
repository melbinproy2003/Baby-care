<?php
session_start();
if($_SESSION["admin_id"]=="")
{
    header("location:../Guest/Login.php");
}
?>