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
	if($_SESSION['user'])
	{
		include('functions.php');
		include('../conn/conn.php');
		$name=$_GET['name'];
			$sql = "SELECT * FROM coupans WHERE cup_id LIKE '%$name%' or cup_code LIKE '%$name%'"; 
					$rs_result = $conn->query($sql); //run the query
					
					if($rs_result->num_rows>0){
										echo '<table class="table table-hover">';
				echo '<thead>
					  <tr>
						<th>Coupan ID</th>
						<th>Coupan Code</th>
						<th>Coupan Valid Till</th>
						<th>Coupan Description</th>
						<th>Status</th>
						<th>Delete</th>
						<th>Edit</th>
					  </tr>
					</thead>';
					$sno=0;
					while ($row =$rs_result->fetch_assoc()) { 
					echo '<tr>
						<td>'.$row['cup_id'].'</td>
						<td>'.$row['cup_code'].'</td>
						<td>'.$row['cup_valid'].'</td>
						<td>'.$row['cup_desc'].'</td>';
						if($row['cup_status']==1){
							echo '<td>Enabled</td>';
						}else{
							echo '<td>Disabled</td>';
						}
						echo '<td><a class="btn btn-danger" id="'.$row['cup_id'].'" onclick="confirmdelete('.$row['cup_id'].');"><span class="glyphicon glyphicon-trash"></span></a></td>
						<td><a class="btn btn-warning" id="'.$row['cup_id'].'" href="editcoupansingle.php?cat='.$row['cup_id'].'" target="_blank"><span class="glyphicon glyphicon-edit"></span></a></td>
					  </tr>';
				}
				echo '</table>';
			}else{
				echo '<center>No Product with this name.</center>';
			}
	}
?>