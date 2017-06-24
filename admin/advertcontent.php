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
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-th-list"></span> Advertise List</center></div>
  <div class="panel-footer">
	<div class="row" id="showsuccess">
		<?php
			$sql="SELECT * FROM ads";
			$result=$conn->query($sql);
			if($result->num_rows >0){
				echo '<table class="table table-hover">';
				echo '<thead>
					  <tr>
						<th>S.No.</th>
						<th>Name</th>
						<th>Link</th>
						<th>image</th>
						<th>Edit</th>
					  </tr>
					</thead>';
					$sno=0;
				while($row=$result->fetch_assoc()){
					echo '<tr>
						<td>'.++$sno.'</td>
						<td>';
							if($row['ad_type']=="250250") echo "250x250";
							else if($row['ad_type']=="72890") echo "728x90";
							else if($row['ad_type']=="60090") echo "600x90";
						echo '</td>
						<td>'.$row['ad_link'].'</td>
						<td><img src="../'.$row['ad_imglink'].'" width="200px" height="50px" /></td>
						<td><a class="btn btn-warning" id="'.$row['ad_id'].'" href="editadvertreal.php?adid='.$row['ad_id'].'" target="_blank"><span class="glyphicon glyphicon-edit"></span></a></td>
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