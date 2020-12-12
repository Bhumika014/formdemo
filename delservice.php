<?php

include('config.php');
$id = $_GET['id'];

$sql = mysqli_query($conn, "delete from detail where customerid='$id'");

echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Record  Delete Successfully!!')
                    window.location.href='index.php';
                    </SCRIPT>");
?>