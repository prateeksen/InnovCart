<?php
session_start();
include('conn/conn.php');
if(isset($_GET['action'])){
	$code=$_GET['cup'];
	$sql="SELECT cup_code FROM coupans WHERE cup_code='$code' && cup_status='1'";
	$result=$conn->query($sql);
	if($result->num_rows > 0 ){
		while($row=$result->fetch_assoc())
		$_SESSION['coupan']=$row['cup_code'];
		echo "added";
	}
}
?>