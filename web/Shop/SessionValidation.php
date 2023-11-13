<?php
session_start();
if($_SESSION["shop_id"]=="")
{
    header("location:../Guest/Login.php");
}
?>