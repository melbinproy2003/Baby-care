<?php
session_start();
if($_SESSION["user_id"]=="")
{
    header("location:../Guest/Login.php");
}
?>