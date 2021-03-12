<?php

$connect = mysqli_connect("localhost", "root", "", "system");


echo $id_delete = $_GET['id'];

$sql = "DELETE FROM users WHERE id_user = '$id_delete'";
$res = mysqli_query($connect, $sql);

header('location:index.php');


?>