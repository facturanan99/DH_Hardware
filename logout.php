<?php 
require_once("main.php");
$main_class->logout();
header("Location: login.php");