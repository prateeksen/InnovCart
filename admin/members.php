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
<html>
	<head>
		<title>Admin Dashboard - Members</title>
		<meta name="robots" content="noindex,nofollow" />
		<link rel="stylesheet" href="../css/style.css">
		<script src="../css/bjs.js"></script>
		<script src="../css/bjs2.js"></script>
		<script>
		function showusers()
{
	var term=document.getElementById('usname').value;
		
		url="showusers.php?name="+term;
		id="showusers";


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
					<?php include('memberscontent.php'); ?>
				</div>
			</div>
		</div>
	</body>
</html>