<?php
sleep(1);
error_reporting(0);
session_start();
$name=$_SESSION['themer'][0];
$location=$_SESSION['themer'][1];
$snap=$_SESSION['themer'][2];
$sql="INSERT INTO `themes`(`theme_name`, `theme_location`, `theme_snap`, `theme_status`) VALUES ('$name','$location','$snap','0')";
$result=$conn->query($sql);
if($result){
	echo 'Theme Installed';
}

?>