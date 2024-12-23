<?php
include 'db_connect.php';
$id = $_GET['user_id'];
$sql = "DELETE FROM user WHERE user_id='$id'";
$res = mysqli_query($conn, $sql);
if($res)
{
    header('Location:read.php');
}
else
{
    echo "<script>alert('Data not deleted! Error');</script>";
}

?>