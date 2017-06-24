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
	if(isset($_POST['editsub'])){
		$cname=strip_tags($conn->real_escape_string($_POST['catnames']));
		$robots=strip_tags($conn->real_escape_string($_POST['catrobots']));
		$desc=strip_tags($conn->real_escape_string($_POST['catdesc']));
		$key=strip_tags($conn->real_escape_string($_POST['catkey']));
		$catparent=strip_tags($conn->real_escape_string($_POST['catparent']));
		$editid=strip_tags($conn->real_escape_string($_POST['editid']));
		
		$sql="UPDATE `subcat` SET `cat_name`='$catparent',`subcat_name`='$cname',`subcat_robots`='$robots',`subcat_description`='$desc',`subcat_keywords`='$key' WHERE `subcat_id`='$editid'";
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
	$id=$_GET['cat'];
	
	$sql="SELECT * FROM subcat WHERE subcat_id='$id'";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	$catname=$row['subcat_name'];
	$catrobots=$row['subcat_robots'];
	$catdesc=$row['subcat_description'];
	$catkey=$row['subcat_keywords'];
	$catparent=$row['cat_name'];
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
				  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-edit"></span> Edit Sub-Category</center></div>
				  <div class="panel-footer">
				  <form action="editsubcat.php?cat=<?php echo $id; ?>" method="POST">
						<div class="row alert-success" style="padding:1%;">
							<div class="col-sm-3">
								<b>Name </b>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" value="<?php echo $catname; ?>" name="catnames">
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-warning" style="padding:1%;">
							<div class="col-sm-3">
								<b>Category </b>
							</div>
							<div class="col-sm-6">
								<select class="form-control" name="catparent">
									<?php
										$sql="SELECT cat_name FROM `categories`";
										$result=$conn->query($sql);
										while($row=$result->fetch_assoc()){
											echo '<option value="'.$row['cat_name'].'"';
											if($row['cat_name']==$catparent) echo 'selected';
											echo '>'.$row['cat_name'].'</option>';
										}
									?>
								</select>
							</div>
							<div class="col-sm-3">
							
							</div>
						</div>
						<div class="row alert-success" style="padding:1%;">
							<div class="col-sm-3">
								<b>Robots </b>
							</div>
							<div class="col-sm-6">
							<select name="catrobots" class="form-control">
								<option value="follow,index" <?php if("follow,index"==$catrobots) echo 'selected'; ?>>follow,index</option>
								<option value="nofollow,index" <?php if("nofollow,index"==$catrobots) echo 'selected'; ?>>nofollow,index</option>
								<option value="follow,noindex" <?php if("follow,noindex"==$catrobots) echo 'selected'; ?>>follow,noindex</option>
								<option value="nofollow,noindex" <?php if("nofollow,noindex"==$catrobots) echo 'selected'; ?>>nofollow,noindex</option>
							</select>
							</div>
							<div class="col-sm-3">
							<a href="http://www.robotstxt.org/meta.html" style="text-decoration:none;">See What is Robot.txt</a>
							</div>
						</div>
						<div class="row alert-warning" style="padding:1%;">
							<div class="col-sm-3">
								<b>Description </b>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" value="<?php echo $catdesc; ?>" name="catdesc">
							</div>
							<div class="col-sm-3">
							Enter a description which is related to category.
							</div>
						</div>
						<div class="row alert-success" style="padding:1%;">
							<div class="col-sm-3">
								<b>Keywords </b>
							</div>
							<div class="col-sm-6">
								<input type="text" class="form-control" value="<?php echo $catkey; ?>" name="catkey">
							</div>
							<div class="col-sm-3">
							Enter Keyword with , Seperator(for ex: punjabi songs,hindi songs)
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
						<input type="hidden" value="<?php echo $id; ?>" name="editid">
						</form>
					</div>
			</div>
		</div>
	</body>
</html>