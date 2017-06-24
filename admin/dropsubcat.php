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
	header("Location:..404.php");
}
include('../conn/conn.php');

	$cat=$_GET['name'];
	
	$sql="SELECT * FROM subcat WHERE cat_name='$cat'";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		while($row=$result->fetch_assoc()){
		echo '<option value="'.$row['subcat_id'].'">'.$row['subcat_name'].'</option>';
		}	
	}else{
		echo '<option value="error">No Sub-Category</option>';
	}
	
	
?>