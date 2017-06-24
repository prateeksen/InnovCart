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
		$newname=$_POST['newname'];
		$newdesc=$_POST['newdesc'];
		$newkey=$_POST['newkey'];
		$newrobots=$_POST['newrobots'];
		
		$sql="INSERT INTO `categories`(`cat_name`, `cat_robots`, `cat_description`, `cat_keywords`) VALUES ('$newname','$newrobots','$newdesc','$newkey')";
		if($result=$conn->query($sql)){
			echo "<script>alert('Category Created.');</script>";
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
				<td>Name</td>
				<td><input type="text" class="form-control" placeholder="Enter Name" name="newname" /></td>
			</tr>
			<tr class="alert-warning">
				<td>Description</td>
				<td><input type="text" class="form-control" placeholder="Enter Description" name="newdesc" /></td>
			</tr>
			<tr class="alert-success">
				<td>Keywords</td>
				<td><input type="text" class="form-control" placeholder="Enter Keywords(for ex: punjabi video,bollywood etc.)" name="newkey" /></td>
			</tr>
			<tr class="alert-warning">
				<td>Robots</td>
				<td>
					<select name="newrobots" class="form-control">
								<option value="follow,index">follow,index</option>
								<option value="nofollow,index">nofollow,index</option>
								<option value="follow,noindex">follow,noindex</option>
								<option value="nofollow,noindex">nofollow,noindex</option>
							</select>
				</td>
			</tr>
			<tr class="alert-success">
				<td></td>
				<td><input type="submit" class="btn btn-primary" value="Add" name="newsubmit" /></td>
			</tr>
		</table>
	</form>
  </div>
</div>
<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-th-list"></span> Categories List</center></div>
  <div class="panel-footer">
	<div class="row" id="showsuccess">
		<?php
			$sql="SELECT * FROM categories";
			$result=$conn->query($sql);
			if($result->num_rows >0){
				echo '<table class="table table-hover">';
				echo '<thead>
					  <tr>
						<th>S.No.</th>
						<th>Name</th>
						<th>Robots</th>
						<th>Delete</th>
						<th>Edit</th>
					  </tr>
					</thead>';
					$sno=0;
				while($row=$result->fetch_assoc()){
					echo '<tr>
						<td>'.++$sno.'</td>
						<td>'.$row['cat_name'].'</td>
						<td>'.$row['cat_robots'].'</td>
						<td><a class="btn btn-danger" id="'.$row['cat_name'].'" onclick="confirmme('.$row['cat_id'].');"><span class="glyphicon glyphicon-trash"></span></a></td>
						<td><a class="btn btn-warning" id="'.$row['cat_name'].'" href="editcat.php?cat='.$row['cat_id'].'" target="_blank"><span class="glyphicon glyphicon-edit"></span></a></td>
					  </tr>';
				}
				echo '</table>';
			}else{
				echo '<center>No Categories.Make New Categories.</center>';
			}
		?>
	</div>
  </div>
</div>