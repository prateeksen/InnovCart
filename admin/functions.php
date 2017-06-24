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
if(!isset($_SESSION['user'])){
	header('Location:..404.php');
}
function givesubcat($id){
	include('../conn/conn.php');
	$sql="SELECT subcat_name FROM subcat WHERE subcat_id='$id'";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	return $row['subcat_name'];
}
?>