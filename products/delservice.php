<?php

include('config.php');
$id = $_GET['id'];
$qry = mysqli_query($conn,"SELECT image FROM inqury WHERE serviceid='$id'");
$name = mysqli_fetch_assoc($qry);
$del = $name['image'];
unlink("image/" . $del);
$sql = mysqli_query($conn, "delete from inqury where serviceid='$id'");

echo ("<SCRIPT LANGUAGE='JavaScript'>
                    window.alert('Record  Delete Successfully!!')
                    window.location.href='index.php';
                    </SCRIPT>");
?>