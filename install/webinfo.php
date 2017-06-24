<?php
/*
    InnovCart is a open-source Web Application which can be used to make your own custom video tube website.
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
if(!isset($_SESSION['agree']))
		header('Location:index.php');
	
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
			$_SESSION['agree']=4;
			header('Location:setadmin.php');
		}else{
			$msg="Some Error Occures.";
		}
		
	}
?>

<html>
	<head>
		<title>InnovCart - Installation</title>
		<link rel="stylesheet" href="../css/style.css">
		<script src="../css/bjs.js"></script>
		<script src="../css/bjs2.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<?php include('header.php'); ?>
			</div>
			<div class="row">
					<div class="col-md-3">
					  <ul class="nav nav-pills nav-stacked">
						<li><a href="index.php">Agreement</a></li>
						<?php if($_SESSION['agree']>1) echo '<li> <a href="requirement.php">Requirements</a></li>'; else echo '<li class="disabled"><a>Requirements</a></li>';?>
						<?php if($_SESSION['agree']>2) echo '<li> <a href="install.php">Installation</a></li>'; else echo '<li class="disabled"><a>Installation</a></li>';?>
						<?php if($_SESSION['agree']>3) echo '<li class="active"> <a href="webinfo.php">Website Information</a></li>'; else echo '<li class="disabled"><a>Website Information</a></li>';?>
						<?php if($_SESSION['agree']>4) echo '<li class="active"> <a href="setadmin.php">Create Admin Login</a></li>'; else echo '<li class="disabled"><a>Create Admin Login</a></li>';?>
					 </ul>
				</div>
				<div class="col-sm-9">
								<div class="panel panel-primary">
				  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-edit"></span> Website Information</center></div>
				  <div class="panel-footer">
				  <form action="#" method="POST">
						<div class="row alert-success" style="padding:1%;">
						<?php
								if(isset($msg)){
									echo '<div class="alert alert-danger alert-dismissable">
							  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong>Error!</strong> '.$msg.' 
							</div>';
								}
							?>
							<div class="col-sm-3">
								<b>Website Name </b>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="webname">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-warning" style="padding:1%;">
							<div class="col-sm-3">
								<b>Website Title </b>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="webtitle">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-success" style="padding:1%;">
							<div class="col-sm-3">
								<b>Website Description </b>
							</div>
							<div class="col-sm-6">
								<textarea class="form-control" name="webdes"></textarea>
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
									<option value="follow,index">follow,index</option>
									<option value="nofollow,index">nofollow,index</option>
									<option value="follow,noindex">follow,noindex</option>
									<option value="nofollow,noindex">nofollow,noindex</option>
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
								<input type="text" class="form-control" name="webcopy">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-warning" style="padding:1%;">
							<div class="col-sm-3">
								<b>Website Keywords </b>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="webkey">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-success" style="padding:1%;">
							<div class="col-sm-3">
								<b>Website Facebook Page ID</b>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="webfacebook" placeholder="ex: google">
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
			</div>
		</div>
	</body>
</html>