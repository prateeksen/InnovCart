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
	
		if(isset($_POST['create'])){
		$aemail=$_POST['email'];
		$auser=$_POST['username'];
		$apass=md5($_POST['password']);
		
		$sql="INSERT INTO `admin_details`(`admin_email`, `admin_user`, `admin_pass`) VALUES ('$aemail','$auser','$apass')";
		$result=$conn->query($sql);
		if($result){
			header('Location:../admin/myadmin.php');
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
						<?php if($_SESSION['agree']>3) echo '<li> <a href="webinfo.php">Website Information</a></li>'; else echo '<li class="disabled"><a>Website Information</a></li>';?>
						<?php if($_SESSION['agree']>4) echo '<li class="active"> <a href="setadmin.php">Create Admin Login</a></li>'; else echo '<li class="disabled"><a>Create Admin Login</a></li>';?>
					  </ul>
				</div>
				<div class="col-sm-9">
								<div class="panel panel-primary">
				  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-lock"></span> Create Admin Login</center></div>
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
								<b>Admin email </b>
							</div>
							<div class="col-sm-6">
								<input type="email" class="form-control" name="email">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-warning" style="padding:1%;">
							<div class="col-sm-3">
								<b>Admin Username </b>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="username">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-success" style="padding:1%;">
							<div class="col-sm-3">
								<b>Admin Password </b>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="password">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-warning" style="padding:1%;">
							<div class="col-sm-3">
							</div>
							<div class="col-sm-6">
								<input type="submit" class="btn btn-primary" value="Create" name="create">
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