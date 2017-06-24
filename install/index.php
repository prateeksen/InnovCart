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
	if(isset($_POST['agree'])){
		$_SESSION['agree']=2;
		header("Location:requirement.php");
	}
?>
<?php
if(!isset($_SESSION['agree']))
		$_SESSION['agree']=1;
?>
<html>
	<head>
		<title>InnovCart - Agreement</title>
		<link rel="stylesheet" href="../css/style.css">
		<script src="../css/bjs.js"></script>
		<script src="../css/bjs2.js"></script>
		  <style>
			/* Force scrollbars onto browser window */

			/* Box styles */
			.agreement_box {
			border: none;
			padding: 5px;
			width: 100%;
			height: 400px;
			overflow: scroll;
			}

			/* Scrollbar styles */
			::-webkit-scrollbar {
			width: 12px;
			height: 12px;
			}

			::-webkit-scrollbar-track {
			border: 1px solid yellowgreen;
			border-radius: 10px;
			}

			::-webkit-scrollbar-thumb {
			background: yellowgreen;  
			border-radius: 10px;
			}

			::-webkit-scrollbar-thumb:hover {
			background: #88ba1c;  
			}
			</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<?php include('header.php'); ?>
			</div>
			<div class="row">
					<div class="col-md-3">
					  <ul class="nav nav-pills nav-stacked">
						<li class="active"><a href="index.php">Agreement</a></li>
						<?php if($_SESSION['agree']>1) echo '<li> <a href="requirement.php">Requirements</a></li>'; else echo '<li class="disabled"><a>Requirements</a></li>';?>
						<?php if($_SESSION['agree']>2) echo '<li> <a href="install.php">Installation</a></li>'; else echo '<li class="disabled"><a>Installation</a></li>';?>
						<?php if($_SESSION['agree']>3) echo '<li> <a href="webinfo.php">Website Information</a></li>'; else echo '<li class="disabled"><a>Website Information</a></li>';?>
						<?php if($_SESSION['agree']>4) echo '<li class="active"> <a href="setadmin.php">Create Admin Login</a></li>'; else echo '<li class="disabled"><a>Create Admin Login</a></li>';?>
					  </ul>
				</div>
				<div class="col-sm-9">
					<div class="panel panel-primary">
					  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-user"></span> Agreement</center></div>
					  <div class="panel-footer">
						<div class="row">
							<table class="table table-hover"><tr><td>
								<div class="agreement_box">
									There are some terms of use for this Application. Please read this document carefully.<br/>
									(1) Any one can use this application.<br/>
									(2) <b>InnovCart</b> is an open source web application, which can be contribute or modified by any one.<br/>
									(3) <b>InnovCart</b> not save any kind of information. In case of any information leak InnovCart will not be responsibe for it.<br/>
									(4) InnovCart support all format of videos.<br/>
									(5) This application can not be used for any type of website which contains pornography/nudity contents.<br/> 
									By clicking the "Yes,Agree" button user must be agree with all the above condition.
								</div>
							</td></tr>
							<tr><td>
							<form action="#" method="post" >
							<input type="submit" class="btn btn-primary" value="Yes,Agree" name="agree"/>
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