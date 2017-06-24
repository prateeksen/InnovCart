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
<?php
	if(isset($_POST['newsubmit'])){
		$youid=$_POST['newid'];
		$newcode=$_POST['newcode'];
		$newdesc=$_POST['newdesc'];
		$newstatus=$_POST['newstatus'];
		$newtill=$_POST['newtill'];
		
		$sql="UPDATE `coupans` SET `cup_code`='$newcode',`cup_desc`='$newdesc', `cup_status`='$newstatus', `cup_valid`='$newtill' WHERE `cup_id`='$youid'";
		if($result=$conn->query($sql)){
			echo "<script>alert('Coupan Updated.');</script>";
		}else{
			echo "<script>alert('Some Error Occures.');</script>";
		}
	}

?>
<?php
$id=$_GET['cat'];
	$sql = "SELECT * FROM coupans WHERE cup_id='$id'"; 
	$result = $conn->query($sql); //run the query
	if($result->num_rows>0){
	$row=$result->fetch_assoc();
	
		$ccode=$row['cup_code'];
		$cdesc=$row['cup_desc'];
		$cstatus=$row['cup_status'];
		$cvalid=$row['cup_valid'];
		$date = date_create($cvalid);
		$date=date_format($date,"Y-m-d");
	}

?>
<html>
	<head>
		<title>Admin Dashboard - Edit Coupan</title>
		<meta name="robots" content="noindex,nofollow" />
		<link rel="stylesheet" href="../css/style.css">
		<script src="../css/bjs.js"></script>
		<script src="../css/bjs2.js"></script>
		<script>
			function opensub(e)
			{
				url="dropsubcat.php?name="+e;
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
		</script>
	</head>
	<body>
		<div class="container-flow">
			<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-edit"></span> Edit Coupan</center></div>
  <div class="panel-footer">
	<form action="#" method="POST">
		<table class="table table-hover">
			<tr class="alert-success">
				<td>Coupan Code</td>
				<td><input type="text" class="form-control" placeholder="Enter Code" value="<?php echo $ccode; ?>" name="newcode" /></td>
			</tr>
			<tr class="alert-warning">
				<td>Coupan Desc</td>
				<td><input type="text" class="form-control" placeholder="Enter Description" value="<?php echo $cdesc; ?>" name="newdesc" /></td>
			</tr>
			<tr class="alert-success">
				<td>Coupan Valid Till</td>
				<td><input type="date" class="form-control" placeholder="Enter Keywords(for ex: punjabi video,bollywood etc.)" value="<?php echo $date; ?>" name="newtill"  /></td>
			</tr><input type="hidden" class="form-control" placeholder="Enter Keywords(for ex: punjabi video,bollywood etc.)" value="<?php echo $_GET['cat']; ?>" name="newid"  />
		
			<tr class="alert-warning">
				<td>Coupan Status</td>
				<td>
					<select name="newstatus" class="form-control">
						<?php
						if($cstatus==0){
							echo '<option value="0" selected>Disabled</option>
						<option value="1">Enabled</option>';
						}else{
							echo '<option value="0">Disabled</option>
						<option value="1" selected>Enabled</option>';
						}
						
						?>
					</select>
				</td>
			</tr>
			<tr class="alert-success">
				<td></td>
				<td><input type="submit" class="btn btn-primary" value="Edit" name="newsubmit" /></td>
			</tr>
		</table>
	</form>
  </div>
</div>
		</div>
	</body>
</html>