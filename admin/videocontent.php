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
	if(isset($_POST['newsubmit'])){
		
		//Thumbnail upload start
		$target_dir = "../images/products/";
		$target_file = $target_dir . basename($_FILES["pthumb"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["pthumb"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
		if(move_uploaded_file($_FILES["pthumb"]["tmp_name"], $target_file)){
			$targetthumb=substr($target_file,3);
		}else{
			echo '<script>alert("Error Occures2.");</script>';
		}
		
		
		
		//video Thumbnail end code
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
		
		$sql="INSERT INTO `videos`(`vid_price`,`subcat_id`, `cat_name`, `views`, `likes`, `snapshot_link`, `vid_name`, `vid_keywords`, `vid_robots`, `vid_by`,`vid_desc`,`vid_color`,`vid_size`,`vid_weight`,`vid_quant`) VALUES ('$pprice','$psubcat','$pcat','$pvc','$plc','$targetthumb','$pname','$pkey','$probots','$pby','$pdesc','$pcolor','$psize','$pweight','$pquant')";
		if($result=$conn->query($sql)){
			echo "<script>alert('Product Added.');</script>";
		}else{
			echo "<script>alert('Some Error Occures.');</script>";
		}
		
		
	}

?>
<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-upload"></span> Add Product</center></div>
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
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Name" name="pname" /></td>
			</tr>
			<tr class="alert-warning">
				<td width="50%">Product Price</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Price" name="pprice" /></td>
			</tr>
			<tr class="alert-success">
				<td>Product Keywords</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Keywords Seperated by (,)" name="pkey" /></td>
			</tr>
			<tr class="alert-warning">
				<td>Product By</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Name for ex : Taylor Swaift" name="pby" /></td>
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
				<td>Image Upload</td>
				<td colspan="3"><input type="file" class="form-control" placeholder="Enter Link [for ex : x4dm5it]" name="pthumb" /></td>
			</tr>
			<tr class="alert-success">
				<td>Product Description</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Describe your product" name="pdesc" /></td>
			</tr>
			<tr class="alert-warning">
				<td>Product Color</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter color ex : Red" name="pcolor" /></td>
			</tr>
			<tr class="alert-success">
				<td>Product Size</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Size ex : 100x100" name="psize" /></td>
			</tr>
			<tr class="alert-warning">
				<td>Product Weight</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Weight ex : 1000gms" name="pweight" /></td>
			</tr>
			<tr class="alert-success">
				<td>Product Quantity</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Available Quantity" name="pquant" /></td>
			</tr>
			<tr class="alert-warning">
				<td>Starting View Count</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="as default 0" name="pvc" /></td>
			</tr>
			<tr class="alert-success">
				<td>Starting Like Count</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="as default 0" name="plc" /></td>
			</tr>
			<tr class="alert-warning">
				<td></td>
				<td colspan="3"><input type="submit" class="btn btn-primary" value="Next" name="newsubmit" /></td>
			</tr>
		</table>
	</form>
  </div>
</div>