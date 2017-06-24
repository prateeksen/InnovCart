<?php
/*
    InnovCart is a open-source Web Application which can be used to make your own custom ecommerce website.
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
if(!isset($_SESSION['agree']))
		header('Location:index.php');
	if(isset($_POST['agree'])){
		$_SESSION['agree']=3;
		header("Location:install.php");
	}
?>

<html>
	<head>
		<title>InnovCart - Requirements</title>
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
						<?php if($_SESSION['agree']>1) echo '<li class="active"> <a href="requirement.php">Requirements</a></li>'; else echo '<li class="disabled"><a>Requirements</a></li>';?>
						<?php if($_SESSION['agree']>2) echo '<li> <a href="install.php">Installation</a></li>'; else echo '<li class="disabled"><a>Installation</a></li>';?>
						<?php if($_SESSION['agree']>3) echo '<li> <a href="webinfo.php">Website Information</a></li>'; else echo '<li class="disabled"><a>Website Information</a></li>';?>
						<?php if($_SESSION['agree']>4) echo '<li class="active"> <a href="setadmin.php">Create Admin Login</a></li>'; else echo '<li class="disabled"><a>Create Admin Login</a></li>';?>
					  </ul>
				</div>
				<div class="col-sm-9">
					<div class="panel panel-primary">
					  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-th-large"></span> Requirements</center></div>
					  <div class="panel-footer">
						<div class="row">
							<table class="table table-hover"><tr>
							<td>Welcome to InnovCart, Before getting started we need some information on the database. You will need to know the following 
								items before proceeding.<br/><br/>
								1. Database Name
								<br/><br/>
								2. Database Username
								<br/><br/>
								3. Database Password
								<br/><br/>
								4. Database Host
								<br/><br/>
								If for any reason this automatic file creation doesn't work, don't worry. All this does is fill in the
								database information to a configration file. You may also simply open <b>vsm-config.php</b> in a text editor,
								fill in your information,and save it.
								<br/><br/>
								In all likelihood, these items were supplied to you by your Web Hosting. If you do not have this information,
								then you will need to contact them before you continue. If you're all ready...
							</td></tr>
							<tr><td>
							<form action="#" method="post" >
							<input type="submit" class="btn btn-primary" value="Let's Go" name="agree"/>
							</form>
							</td></tr>
							</table>
						</div>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>