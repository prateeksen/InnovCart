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
include('functions.php');
?>
<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-th-list"></span> Product List</center></div>
  <div class="panel-footer">
	<div class="row" id="showsuccess">
		<?php
					$num_rec_per_page=5;
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
					$start_from = ($page-1) * $num_rec_per_page; 
					$sql = "SELECT * FROM videos ORDER BY vid_id DESC LIMIT $start_from, $num_rec_per_page"; 
					$rs_result = $conn->query($sql); //run the query
					
					if($rs_result->num_rows>0){
										echo '<table class="table table-hover">';
				echo '<thead>
					  <tr>
						<th>Name</th>
						<th>Category</th>
						<th>Sub Category</th>
						<th>Robots</th>
						<th>Delete</th>
						<th>Edit</th>
					  </tr>
					</thead>';
					$sno=0;
					while ($row =$rs_result->fetch_assoc()) { 
					echo '<tr>
						<td>'.substr($row['vid_name'],0,20).'</td>
						<td>'.$row['cat_name'].'</td>
						<td>'.givesubcat($row['subcat_id']).'</td>
						<td>'.$row['vid_robots'].'</td>
						<td><a class="btn btn-danger" id="'.$row['vid_name'].'" onclick="confirmdelete('.$row['vid_id'].');"><span class="glyphicon glyphicon-trash"></span></a></td>
						<td><a class="btn btn-warning" id="'.$row['vid_name'].'" href="editvideosingle.php?cat='.$row['vid_id'].'" target="_blank"><span class="glyphicon glyphicon-edit"></span></a></td>
					  </tr>';
				}
				echo '</table>';
			}else{
				echo '<center>No Categories.Make New Categories.</center>';
			}
		?>
	</div>
		<div class="row">
		<center>
			<ul class="pagination">
				<?php 
					$sql = "SELECT * FROM videos ORDER BY vid_id DESC  "; 
					$rs_result = $conn->query($sql); //run the query
					$total_records = $rs_result->num_rows;  //count number of records
					$total_pages = ceil($total_records / $num_rec_per_page); 
					
					if($total_records>0)
					echo "<li><a href='editvideo.php?page=1'>".'<'."</a></li> "; // Goto 1st page  

					for ($i=1; $i<=$total_pages; $i++) { 
								echo "<li><a href='editvideo.php?page=".$i."'>".$i."</a></li> "; 
					}; 
					if($total_records>0)
					echo "<li><a href='editvideo.php?page=$total_pages'>".'>'."</a></li> "; // Goto last page
				?>
			</ul></center>
</div>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-search"></span> Search Product</center></div>
  <div class="panel-footer">
	<div class="row">
		<input type="text" class="form-control" placeholder="Start Typing a Username or Name" onkeydown="showvideos()" onkeyup="showvideos()" id="usname" />
	<div  id="showvideos">
		</div>
	</div>
  </div>
</div>