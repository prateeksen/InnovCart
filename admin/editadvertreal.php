<?php
/*
    InnovCart is a open-source Web Application which can be used to make your own custom e-commerce website.
    Copyright (C) 2017  Rahul Kumar

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<?php 
error_reporting(0);
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['user'])){
	header('Location:../404.php');
}
 ?>
<?php
	if(isset($_POST['newsubmit'])){
		if(!empty(basename($_FILES["adimage"]["name"])))
		{
			$target_dir = "../images/ads/";
			$target_file = $target_dir . basename($_FILES["adimage"]["name"]);
			$uploadOk = 1;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["adimage"]["tmp_name"]);
				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "File is not an image.";
					$uploadOk = 0;
				}
			}
			if(move_uploaded_file($_FILES["adimage"]["tmp_name"], $target_file)){
				$targetlink=substr($target_file,3);
			}else{
				echo '<script>alert("Error Occures.");</script>';
			}
			
			$adlinke=$conn->real_escape_string($_POST['adlink']);
			$adid=strip_tags($conn->real_escape_string($_POST['idad']));
			
			$sql="UPDATE `ads` SET `ad_link`='$adlinke',`ad_imglink`='$targetlink' WHERE `ad_id`='$adid'";
			$result=$conn->query($sql);
			if($result){
				echo '<script>alert("Advertise Updated.");</script>';
			}else{
				echo '<script>alert("Error Occures.");</script>';
			}
		}else{
			$adlinke=$conn->real_escape_string($_POST['adlink']);
			$adid=strip_tags($conn->real_escape_string($_POST['idad']));
			
			$sql="UPDATE `ads` SET `ad_link`='$adlinke' WHERE `ad_id`='$adid'";
			$result=$conn->query($sql);
			if($result){
				echo '<script>alert("Advertise Updated.");</script>';
			}else{
				echo '<script>alert("Error Occures.");</script>';
			}
		}
		
	}
?>
<?php
$id=$_GET['adid'];
	$sql="SELECT * FROM ads WHERE ad_id='$id'";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	
	$adlink=$row['ad_link'];
	$adimage=$row['ad_imglink'];

?>
<html>
	<head>
		<title>Admin Dashboard - Edit Advertise</title>
		<meta name="robots" content="noindex,nofollow" />
		<link rel="stylesheet" href="../css/style.css">
		<script src="../css/bjs.js"></script>
		<script src="../css/bjs2.js"></script>
	</head>
	<body>
		<div class="container-flow">
			<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-edit"></span> Edit Advertise</center></div>
  <div class="panel-footer">
	<form action="#" method="POST" enctype="multipart/form-data">
		<table class="table table-hover">
			<tr class="alert-success">
				<td>Advertise Link</td>
				<td colspan="3"><input type="text" class="form-control" value="<?php echo $adlink; ?>" placeholder="Enter Name" name="adlink" /></td>
			</tr>
			<tr class="alert-warning">
				<td>Existing Advertise Image</td>
				<td colspan="3"><img src="../<?php echo $adimage; ?>"  width="200px" height="50px" /></td>
			</tr>
			<tr class="alert-success">
				<td>Advertise Image</td>
				<td colspan="3"><input type="file" class="form-control" placeholder="as default 0" name="adimage" /></td>
			</tr>
			<tr class="alert-warning">
				<td></td>
				<input type="hidden" value="<?php echo $id; ?>" name="idad"/>
				<td colspan="3"><input type="submit" class="btn btn-primary" value="Edit" name="newsubmit" /></td>
			</tr>
		</table>
	</form>
  </div>
</div>
		</div>
	</body>
</html>