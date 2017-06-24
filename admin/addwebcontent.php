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
	if(isset($_POST['editsub'])){
		$name=strip_tags($conn->real_escape_string($_POST['webname']));
		$title=strip_tags($conn->real_escape_string($_POST['webtitle']));
		$des=strip_tags($conn->real_escape_string($_POST['webdes']));
		$robots=strip_tags($conn->real_escape_string($_POST['webrobots']));
		$copy=strip_tags($conn->real_escape_string($_POST['webcopy']));
		$key=strip_tags($conn->real_escape_string($_POST['webkey']));
		$facebook=strip_tags($conn->real_escape_string($_POST['webfacebook']));
		
		$sql="UPDATE `website_attrib` SET `web_name`='$name',`web_title`='$title',`web_des`='$des',`web_robots`='$robots',`web_copy`='$copy',`web_keywords`='$key',`web_facebook`='$facebook'";
		$result=$conn->query($sql);
		if($result){
			$msg="Sub-Category Edited Successfuly.";
		}else{
			$msg="Some Error Occures.";
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
	$webname=$row['web_name'];
	$webtitle=$row['web_title'];
	$webdes=$row['web_des'];
	$webrobots=$row['web_robots'];
	$webcopy=$row['web_copy'];
	$webkey=$row['web_keywords'];
	$webfacebook=$row['web_facebook'];
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
					  <li class="active"><a href="websetting.php">Basic Settings</a></li>
					  <li><a href="fav.php">Fevicon</a></li>
					  <li><a href="logo.php">Website Logo</a></li>
					</ul><hr/>
				  <form action="websetting.php" method="POST">
						<div class="row alert-success" style="padding:1%;">
							<div class="col-sm-3">
								<b>Website Name </b>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" value="<?php echo $webname; ?>" name="webname">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-warning" style="padding:1%;">
							<div class="col-sm-3">
								<b>Website Title </b>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" value="<?php echo $webtitle; ?>" name="webtitle">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-success" style="padding:1%;">
							<div class="col-sm-3">
								<b>Website Description </b>
							</div>
							<div class="col-sm-6">
								<textarea class="form-control" name="webdes"><?php echo $webdes; ?></textarea>
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-warning" style="padding:1%;">
							<div class="col-sm-3">
								<b>Website Robots </b>
							</div>
							<div class="col-sm-6">
								<select name="webrobots" class="form-control">
									<option value="follow,index" <?php if("follow,index"==$webrobots) echo 'selected'; ?>>follow,index</option>
									<option value="nofollow,index" <?php if("nofollow,index"==$webrobots) echo 'selected'; ?>>nofollow,index</option>
									<option value="follow,noindex" <?php if("follow,noindex"==$webrobots) echo 'selected'; ?>>follow,noindex</option>
									<option value="nofollow,noindex" <?php if("nofollow,noindex"==$webrobots) echo 'selected'; ?>>nofollow,noindex</option>
								</select>
							</div>
							<div class="col-sm-3">
							<a href="http://www.robotstxt.org/meta.html" style="text-decoration:none;">See What is Robot.txt</a>
							</div>
						</div>
						<div class="row alert-success" style="padding:1%;">
							<div class="col-sm-3">
								<b>Website Copyright </b>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" value="<?php echo $webcopy; ?>" name="webcopy">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-warning" style="padding:1%;">
							<div class="col-sm-3">
								<b>Website Keywords </b>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" value="<?php echo $webkey; ?>" name="webkey">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-success" style="padding:1%;">
							<div class="col-sm-3">
								<b>Website Facebook Page ID</b>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" value="<?php echo $webfacebook; ?>" name="webfacebook" placeholder="ex: google">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-warning" style="padding:1%;">
							<div class="col-sm-3">
							</div>
							<div class="col-sm-6">
								<input type="submit" class="btn btn-primary" value="Edit" name="editsub">
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