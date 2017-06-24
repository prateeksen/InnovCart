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
	session_start();
	if(!isset($_SESSION['user'])){
		header('Location:../404.php');
	}
	include('../conn/conn.php');
	$id=strip_tags($conn->real_escape_string($_GET['id']));
	
	$sql="DELETE FROM categories WHERE cat_id='$id'";
	$result=$conn->query($sql);
	if($result){
		echo '<div class="alert alert-success alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> Successfully Deleted!!
</div>';
	}else{
		echo '<div class="alert alert-danger alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Error!</strong> Some Error Occures!!
</div>';
	}
	
	
?>
<?php
			$sql="SELECT * FROM categories";
			$result=$conn->query($sql);
			if($result->num_rows >0){
				echo '<table class="table table-hover">';
				echo '<thead>
					  <tr>
						<th>S.No.</th>
						<th>Name</th>
						<th>Delete</th>
						<th>Edit</th>
					  </tr>
					</thead>';
					$sno=0;
				while($row=$result->fetch_assoc()){
					echo '<tr>
						<td>'.++$sno.'</td>
						<td>'.$row['cat_name'].'</td>
						<td><a class="btn btn-danger" id="'.$row['cat_name'].'" onclick="confirmme('.$row['cat_id'].');"><span class="glyphicon glyphicon-trash"></span></a></td>
						<td>Edit</td>
					  </tr>';
				}
				echo '</table>';
			}else{
				echo '<center>No Categories.Make New Categories.</center>';
			}
		?>