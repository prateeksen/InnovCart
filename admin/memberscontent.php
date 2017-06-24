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
<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-th-list"></span> Members List</center></div>
  <div class="panel-footer">
	<div class="row">
		<?php
		
			$num_rec_per_page=10;
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
					$start_from = ($page-1) * $num_rec_per_page; 
					$sql = "SELECT * FROM members LIMIT $start_from, $num_rec_per_page";
			$result=$conn->query($sql);
			if($result->num_rows >0){
				echo '<table class="table table-hover">';
				echo '<thead>
					  <tr>
						<th>S.No.</th>
						<th>Name</th>
						<th>Username</th>
						<th>Gender</th>
						<th>Email</th>
					  </tr>
					</thead>';
					$sno=0;
				while($row=$result->fetch_assoc()){
					echo '<tr>
						<td>'.++$sno.'</td>
						<td>'.$row['user_fname'].' '.$row['user_lname'].'</td>
						<td><a href="../viewprofile.php?user='.$row['user_username'].'">'.$row['user_username'].'</a></td>
						<td>'.$row['user_gender'].'</td>
						<td>'.$row['user_email'].'</td>
						</tr>';
				}
				echo '</table>';
			}else{
				echo '<center>No Users.</center>';
			}
		?>
	</div>
			<div class="row">
		<center>
			<ul class="pagination">
				<?php 
					$sql = "SELECT * FROM members"; 
					$rs_result = $conn->query($sql); //run the query
					$total_records = $rs_result->num_rows;  //count number of records
					$total_pages = ceil($total_records / $num_rec_per_page); 
					
					if($total_records>0)
					echo "<li><a href='members.php?page=1'>".'<'."</a></li> "; // Goto 1st page  

					for ($i=1; $i<=$total_pages; $i++) { 
								echo "<li><a href='members.php?page=".$i."'>".$i."</a></li> "; 
					}; 
					if($total_records>0)
					echo "<li><a href='members.php?page=$total_pages'>".'>'."</a></li> "; // Goto last page
				?>
			</ul></center>
	</div>
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-search"></span> Search User</center></div>
  <div class="panel-footer">
	<div class="row">
		<input type="text" class="form-control" placeholder="Start Typing a Username or Name" onkeydown="showusers()" onkeyup="showusers()" id="usname" />
	<div  id="showusers">
		</div>
	</div>
  </div>
</div>