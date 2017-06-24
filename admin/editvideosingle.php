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
<?php
	if(isset($_POST['newsubmit'])){
		$youid=$_GET['cat'];
		$pcat=$_POST['pcat'];
		$psubcat=$_POST['psubcat'];
		$pname=$_POST['pname'];
		$pkey=$_POST['pkey'];
		$pby=$_POST['pby'];
		$probots=$_POST['probots'];
		$pprice=$_POST['pprice'];
		$pvc=$_POST['pvc'];
		$plc=$_POST['plc'];
		$pdesc=$_POST['pdesc'];
		$pcolor=$_POST['pcolor'];
		$psize=$_POST['psize'];
		$pquant=$_POST['pquant'];
		$pweight=$_POST['pweight'];
		
		$sql="UPDATE `videos` SET `vid_price`='$pprice',`subcat_id`='$psubcat', `cat_name`='$pcat', `views`='$pvc', `likes`='$plc', `vid_name`='$pname', `vid_keywords`='$pkey', `vid_robots`='$probots', `vid_by`='$pby',`vid_desc`='$pdesc',`vid_color`='$pcolor',`vid_size`='$psize',`vid_weight`='$pweight',`vid_quant`='$pquant' WHERE `vid_id`='$youid'";
		if($result=$conn->query($sql)){
			echo "<script>alert('Video Uploaded.');</script>";
		}else{
			echo "<script>alert('Some Error Occures.');</script>";
		}
	}

?>
<?php
$id=$_GET['cat'];
	$sql="SELECT * FROM videos WHERE vid_id='$id'";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	
		$pcate=$row['cat_name'];
		$psubcate=$row['subcat_id'];
		$pnamee=$row['vid_name'];
		$pkeye=$row['vid_keywords'];
		$pbye=$row['vid_by'];
		$probotse=$row['vid_robots'];
		$pvce=$row['views'];
		$plce=$row['likes'];
		$ppricee=$row['vid_price'];
		$pdesce=$row['vid_desc'];
		$psizee=$row['vid_size'];
		$pcolore=$row['vid_color'];
		$pweighte=$row['vid_weight'];
		$pqant=$row['vid_quant'];

?>
<html>
	<head>
		<title>Admin Dashboard - Add Category</title>
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
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-edit"></span> Edit Video</center></div>
  <div class="panel-footer">
	<form action="#" method="POST" enctype="multipart/form-data">
		<table class="table table-hover">
			<tr class="alert-success">
				<td>Category</td>
				<td colspan="3">
					<select name="pcat" class="form-control" onchange="opensub(this.value);" required>
						<option value="error">- Select Category -</option>';
						<?php
							$sql="SELECT cat_name FROM `categories`";
							$result=$conn->query($sql);
							while($row=$result->fetch_assoc()){
								echo '<option value="'.$row['cat_name'].'">'.$row['cat_name'].'</option>';
							}
						?>
					</select>
				</td>
			</tr>
			<tr class="alert-warning">
				<td>Sub-Category</td>
				<td colspan="3">
					<select class="form-control" name="psubcat" id="showsuccess">
					</select>	
				</td>
			</tr>
			<tr class="alert-success">
				<td>Product Name</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Name" value="<?php echo $pnamee; ?>" name="pname" /></td>
			</tr>
			<tr class="alert-warning">
				<td width="50%">Product Price</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Price" value="<?php echo $ppricee; ?>" name="pprice" /></td>
			</tr>
			<tr class="alert-success">
				<td>Product Keywords</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Keywords Seperated by (,)" value="<?php echo $pkeye; ?>" name="pkey" /></td>
			</tr>
			<tr class="alert-warning">
				<td>Product By</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Name for ex : Taylor Swaift" value="<?php echo $pbye; ?>" name="pby" /></td>
			</tr>
			<tr class="alert-success">
				<td>Product Robots</td>
				<td colspan="3">
					<select name="probots" class="form-control">
								<option value="follow,index">follow,index</option>
								<option value="nofollow,index">nofollow,index</option>
								<option value="follow,noindex">follow,noindex</option>
								<option value="nofollow,noindex">nofollow,noindex</option>
							</select>
				</td>
			</tr>
			<tr class="alert-warning">
				<td>Product Color</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter color ex : Red" value="<?php echo $pcolore; ?>" name="pcolor" /></td>
			</tr>
			<tr class="alert-success">
				<td>Product Size</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Size ex : 100x100" value="<?php echo $psizee; ?>" name="psize" /></td>
			</tr>
			<tr class="alert-warning">
				<td>Product Weight</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Weight ex : 1000gms" value="<?php echo $pweighte; ?>" name="pweight" /></td>
			</tr>
			<tr class="alert-success">
				<td>Product Quantity</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Available Quantity" value="<?php echo $pqant; ?>" name="pquant" /></td>
			</tr>
			<tr class="alert-warning">
				<td>Starting View Count</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="as default 0" value="<?php echo $pvce; ?>" name="pvc" /></td>
			</tr>
			<tr class="alert-success">
				<td>Starting Like Count</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="as default 0" <?php echo $plce; ?> name="plc" /></td>
			</tr>
			
			<tr class="alert-warning">
				<td>Product Description</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Describe your product" value="<?php echo $pdesce; ?>" name="pdesc" /></td>
			</tr>
			<tr class="alert-success">
				<td></td>
				<td colspan="3"><input type="submit" class="btn btn-primary" value="Next" name="newsubmit" /></td>
			</tr>
		</table>
	</form>
  </div>
</div>
		</div>
	</body>
</html>