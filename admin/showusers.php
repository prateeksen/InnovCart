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
		include('../conn/conn.php');
		$name=$_GET['name'];
			$sql="SELECT * FROM members WHERE user_username LIKE '%$name%' or user_fname='%$name%' or user_lname='%$name%' or user_email='%$name%'";
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
				echo '<center>No Users with this name.</center>';
			}
	}
?>