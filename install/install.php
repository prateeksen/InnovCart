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
if(!isset($_SESSION['agree']))
		header('Location:index.php');
	if(isset($_POST['agree'])){
		$_SESSION['agree']=4;
		$_SESSION['dbname']=$_POST['dbname'];
		$_SESSION['dbuser']=$_POST['dbuser'];
		$_SESSION['dbpass']=$_POST['dbpass'];
		$_SESSION['dbhost']=$_POST['dbhost'];
		
		$connection=new mysqli($_SESSION['dbhost'],$_SESSION['dbuser'],$_SESSION['dbpass'],$_SESSION['dbname']);
		if(!mysqli_connect_errno()){
			include('vsm-config.php');
			include('changecont.php');
			header("Location:webinfo.php");
		}else{
			$msg="Are you sure all informations are correct? Please recheck.";
		}
		
	}
?>

<html>
	<head>
		<title>InnovCart - Installation</title>
		<link rel="stylesheet" href="../css/style.css">
		<script src="../css/bjs.js"></script>
		<script src="../css/bjs2.js"></script>
		<style>
				.glyphicon.fast-right-spinner {
					-webkit-animation: glyphicon-spin-r 1s infinite linear;
					animation: glyphicon-spin-r 1s infinite linear;
				}

				.glyphicon.normal-right-spinner {
					-webkit-animation: glyphicon-spin-r 2s infinite linear;
					animation: glyphicon-spin-r 2s infinite linear;
				}

				.glyphicon.slow-right-spinner {
					-webkit-animation: glyphicon-spin-r 3s infinite linear;
					animation: glyphicon-spin-r 3s infinite linear;
				}

				.glyphicon.fast-left-spinner {
					-webkit-animation: glyphicon-spin-l 1s infinite linear;
					animation: glyphicon-spin-l 1s infinite linear;
				}

				.glyphicon.normal-left-spinner {
					-webkit-animation: glyphicon-spin-l 2s infinite linear;
					animation: glyphicon-spin-l 2s infinite linear;
				}

				.glyphicon.slow-left-spinner {
					-webkit-animation: glyphicon-spin-l 3s infinite linear;
					animation: glyphicon-spin-l 3s infinite linear;
				}

				@-webkit-keyframes glyphicon-spin-r {
					0% {
						-webkit-transform: rotate(0deg);
						transform: rotate(0deg);
					}

					100% {
						-webkit-transform: rotate(359deg);
						transform: rotate(359deg);
					}
				}

				@keyframes glyphicon-spin-r {
					0% {
						-webkit-transform: rotate(0deg);
						transform: rotate(0deg);
					}

					100% {
						-webkit-transform: rotate(359deg);
						transform: rotate(359deg);
					}
				}

				@-webkit-keyframes glyphicon-spin-l {
					0% {
						-webkit-transform: rotate(359deg);
						transform: rotate(359deg);
					}

					100% {
						-webkit-transform: rotate(0deg);
						transform: rotate(0deg);
					}
				}

				@keyframes glyphicon-spin-l {
					0% {
						-webkit-transform: rotate(359deg);
						transform: rotate(359deg);
					}

					100% {
						-webkit-transform: rotate(0deg);
						transform: rotate(0deg);
					}
				}

		</style>
		<script>
			function installing(){
				document.getElementById('showinstall').innerHTML="<span class='badge' align='center'><span class='glyphicon glyphicon-repeat fast-right-spinner'></span> Installing </span>";
					
			}
		</script>	
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
						<?php if($_SESSION['agree']>2) echo '<li class="active"> <a href="install.php">Installation</a></li>'; else echo '<li class="disabled"><a>Installation</a></li>';?>
						<?php if($_SESSION['agree']>3) echo '<li> <a href="webinfo.php">Website Information</a></li>'; else echo '<li class="disabled"><a>Website Information</a></li>';?>
						<?php if($_SESSION['agree']>4) echo '<li class="active"> <a href="setadmin.php">Create Admin Login</a></li>'; else echo '<li class="disabled"><a>Create Admin Login</a></li>';?>
					  </ul>
				</div>
				<div class="col-sm-9">
					<div class="panel panel-primary">
					  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-download-alt"></span> Installation</center></div>
					  <div class="panel-footer">
						<div class="row">
							<?php
								if(isset($msg)){
									echo '<div class="alert alert-danger alert-dismissable">
							  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong>Error!</strong> '.$msg.' 
							</div>';
								}
							?>
							<form action="#" method="post" >
							<table class="table table-hover"><tr>
							<td colspan="3">Welcome to Innovcart, Before getting started we need some information on the database. You will need to know the following 
								items before proceeding.<br/>
							</td></tr>
							<tr><td>
							Database Name : 
							</td><td><input type="text" name="dbname" class="form-control" required /></td><td>The name of database you want to run InnovCart in.</td></tr>

							<tr><td>
							User Name : 
							</td><td><input type="text" name="dbuser" class="form-control" required /></td><td>Your MySQL Username.</td></tr>
							<tr><td>
	
							Password : 
							</td><td><input type="text" name="dbpass" class="form-control"/></td><td>... and your MySQL Password.</td></tr>
							<tr><td>
				
							Database Host : 
							</td><td><input type="text" name="dbhost" class="form-control" required /></td><td>You should able to get this info from your web host, if <i>localhost</i> does not work.</td></tr>
							<tr><td>
							<input type="submit" class="btn btn-primary" value="Install" onclick="installing();" name="agree"/>
							</form>
							</td><td>
								<div id="showinstall"></div>
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