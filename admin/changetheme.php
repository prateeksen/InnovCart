<?php
	/*if(copy('..\themes\two.css','..\css\style.css')){
		echo 'Theme Changed';
	}else{
		echo 'Some Error Occures';
	}
*/
?>
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
//error_reporting(0);
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['user'])){
	header('Location:../404.php');
}
?>
<html>
	<head>
		<title>Admin Dashboard - Theme Settings</title>
		<meta name="robots" content="noindex,nofollow" />
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
			function install(e)
			{
				var r = confirm("Are You Sure?");
				if(r==true){
					document.getElementById('showsuccess').innerHTML="<span class='badge' align='center'><span class='glyphicon glyphicon-repeat fast-right-spinner'></span> Installing </span>";
					url="installtheme.php?id="+e;
					id="showsuccess";


					xhr=new XMLHttpRequest();


					xhr.open("GET", url , true);
					xhr.send();

					function lwdata()
					{
						if(xhr.readyState==4)
						{
						data=xhr.responseText;
						document.getElementById(id).innerHTML=data;
						//alert(data);
						}
					}
					xhr.onreadystatechange=lwdata;
				}
			}
		</script>
				<script>
		function showcups()
{
	var term=document.getElementById('usname').value;
		
		url="showcups.php?name="+term;
		id="showvideos";


		xhr=new XMLHttpRequest();


		xhr.open("GET", url , true);
		xhr.send();

		function lwdata()
		{
			if(xhr.readyState==4)
			{
			data=xhr.responseText;
			document.getElementById(id).innerHTML=data;
			}
		}
		xhr.onreadystatechange=lwdata;
}
</script>
	</head>
	<body>
		<?php include('nav.php'); ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3">
					<?php include('leftcontent.php'); ?>
				</div>
				<div class="col-sm-9">
					<?php include('currenttheme.php'); ?>
					<?php include('themelist.php'); ?>
					<?php include('themeavail.php'); ?>
				</div>
			</div>
		</div>
	</body>
</html>