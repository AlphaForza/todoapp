<?php
// here is connection from another file;
require 'connection.php';

$sql = "SELECT * FROM todos ORDER BY created_time DESC";

$query = mysqli_query($con, $sql); // MySQL results set

$results = mysqli_fetch_all($query, MYSQLI_ASSOC); // MYSQLI_ASSOC - he change sql datatype to associative array!
$levelOfTask = [null, 'normal', 'medium', 'hard'];
$page = 'main';



require 'index.view.php';
