<?php
require 'connection.php';

$id = $_POST['id'];

$sql = "UPDATE todos SET done = 1 WHERE id = $id";
$query = mysqli_query($con, $sql);

header('Location: index.php');