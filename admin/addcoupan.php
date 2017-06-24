<?php
	if(isset($_POST['newsubmit'])){
		$newcode=$_POST['newcode'];
		$newdesc=$_POST['newdesc'];
		$newtill=$_POST['newtill'];
		
		$sql="INSERT INTO `coupans`(`cup_code`, `cup_desc`, `cup_valid`) VALUES ('$newcode','$newdesc','$newtill')";
		if($result=$conn->query($sql)){
			echo "<script>alert('Coupan Created.');</script>";
		}else{
			echo "<script>alert('Some Error Occures.');</script>";
		}
	}

?>
<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-th-list"></span> Add Categories</center></div>
  <div class="panel-footer">
	<form action="#" method="POST">
		<table class="table table-hover">
			<tr class="alert-success">
				<td>Coupan Code</td>
				<td><input type="text" class="form-control" placeholder="Enter Code" name="newcode" /></td>
			</tr>
			<tr class="alert-warning">
				<td>Coupan Desc</td>
				<td><input type="text" class="form-control" placeholder="Enter Description" name="newdesc" /></td>
			</tr>
			<tr class="alert-success">
				<td>Coupan Valid Till</td>
				<td><input type="date" class="form-control" placeholder="Enter Keywords(for ex: punjabi video,bollywood etc.)" name="newtill" /></td>
			</tr>
			<tr class="alert-success">
				<td></td>
				<td><input type="submit" class="btn btn-primary" value="Add" name="newsubmit" /></td>
			</tr>
		</table>
	</form>
  </div>
</div>