<?php
require './connection.php';
$id = $_GET['id'];

$sql = "DELETE FROM todos WHERE id = $id";

mysqli_query($con, $sql);

$sql = "SELECT * FROM todos";

$query = mysqli_query($con, $sql);
$todos = mysqli_fetch_all($query, MYSQLI_ASSOC);


if (isset($_GET['x']) && $_GET['x'] === 'xml') {
    echo json_encode($todos);
} else {
    header('Location: index.php');
}
