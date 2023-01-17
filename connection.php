<?php
$config = require 'config.php';

$con = mysqli_connect($config['host'], $config['username'], $config['password'], $config['db']) or die("Connection Error");