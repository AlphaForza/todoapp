<?php


require 'connection.php';

$created_at = $_POST['created_at'];
$created_for = $_POST['created_for'];
$level = $_POST['level'];
$datetime = $_POST['datetime'];
$msg = $_POST['msg'];

$sql = "INSERT INTO todos VALUES (NULL,'$level',0,'$created_for','$created_at','$datetime','$msg')";

$query = mysqli_query($con, $sql);

if ($query) {
    header('Location: index.php');
}

require 'addNewTodo.view.php';