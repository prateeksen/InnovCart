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
include('../conn/conn.php');
if(!isset($_SESSION['user'])){
	header('Location:../404.php');
}
 ?>
 <?php
	/*if(isset($_POST['editsub'])){
		$name=$_POST['webname'];
		$title=$_POST['webtitle'];
		$des=$_POST['webdes'];
		$robots=$_POST['webrobots'];
		$copy=$_POST['webcopy'];
		$key=$_POST['webkey'];
		$facebook=$_POST['webfacebook'];
		
		$sql="UPDATE `website_attrib` SET `web_name`='$name',`web_title`='$title',`web_des`='$des',`web_robots`='$robots',`web_copy`='$copy',`web_keywords`='$key',`web_facebook`='$facebook'";
		$result=$conn->query($sql);
		if($result){
			$msg="Sub-Category Edited Successfuly.";
		}else{
			$msg="Some Error Occures.";
		}
		
	}
	*/
 ?>
 
 <?php
 if(isset($_POST['editsub']))
 {
		$target_dir = "../images/fav/";
		$target_file = $target_dir . basename($_FILES["favicon"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["favicon"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		if(move_uploaded_file($_FILES["favicon"]["tmp_name"], $target_file)){
			$targetme=substr($target_file,3);
			$sql="UPDATE `website_attrib` SET `web_fev`='$targetme'";
			$result=$conn->query($sql);
			if($result){	
			 echo '<script>alert("Favicon Updated.");</script>';
			}else{
				
			echo '<script>alert("Error Occures.");</script>';
			}
		}else{
			echo '<script>alert("Error Occures.");</script>';
		}
 }

?>

 <?php
	if(!isset($_SESSION['user'])){
		header('Location:../404.php');
	}
	include('../conn/conn.php');
	
	$sql="SELECT * FROM website_attrib";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	$webfav=$row['web_fev'];
?>
<html>
	<head>
		<title>Admin Dashboard - Add Category</title>
		<meta name="robots" content="noindex,nofollow" />
		<link rel="stylesheet" href="../css/style.css">
		<script src="../css/bjs.js"></script>
		<script src="../css/bjs2.js"></script>
	</head>
	<body>
		<div class="container-flow">
			<div class="panel panel-primary">
				  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-edit"></span> Edit Website Settings</center></div>
				  <div class="panel-footer">
					<ul class="nav nav-pills">
					  <li><a href="websetting.php">Basic Settings</a></li>
					  <li class="active"><a href="fav.php">Fevicon</a></li>
					  <li><a href="logo.php">Website Logo</a></li>
					</ul><hr/>
					<div class="row alert-success" style="padding:1%;">
							<div class="col-sm-3">
								<b>Current Favicon </b>
							</div>
							<div class="col-sm-6">
								<img src="../<?php echo $webfav; ?>" />
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
				  <form action="fav.php" method="POST" enctype="multipart/form-data">
						<div class="row alert-warning" style="padding:1%;">
							<div class="col-sm-3">
								<b>Upload Favicon </b>
							</div>
							<div class="col-sm-6">
								<input type="file" class="form-control" name="favicon">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-success" style="padding:1%;">
							<div class="col-sm-3">
							</div>
							<div class="col-sm-6">
								<input type="submit" class="btn btn-primary" value="Change" name="editsub">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						</form>
					</div>
			</div>
		</div>
	</body>
</html>