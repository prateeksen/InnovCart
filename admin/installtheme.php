<?php
session_start();
include('../conn/conn.php');
$name=$_GET['id'];
$location=$name.'.css';
$snap=$name.'.jpeg';
$_SESSION['themer'][0]=$name;
$_SESSION['themer'][1]=$location;
$_SESSION['themer'][2]=$snap;
$themer='../themes/installer.php';
include($themer);
?>