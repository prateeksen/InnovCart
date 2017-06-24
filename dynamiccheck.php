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
include('conn/conn.php');
if(isset($_GET['user'])){
	$user=$_GET['user'];
	$sql="SELECT * FROM members WHERE user_username='$user'";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		echo "<span class='badge' align='center'><span class='glyphicon glyphicon-remove'></span> Username not available.</span>";
	}else{
		echo "<span class='badge' align='center'><span class='glyphicon glyphicon-ok'></span> Username available.</span>";
	}
}
if(isset($_GET['email'])){
	$email=$_GET['email'];
	$sql="SELECT * FROM members WHERE user_email='$email'";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		echo "<span class='badge' align='center'><span class='glyphicon glyphicon-remove'></span> Email already exists.</span>";
	}else{
		echo "<span class='badge' align='center'><span class='glyphicon glyphicon-ok'></span> Email can be use.</span>";
	}
}
if(isset($_GET['exemail'])){
	//sleep(1);
	$email=$_GET['exemail'];
	$sql="SELECT * FROM members WHERE user_email='$email'";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		echo "<span class='badge' align='center'><span class='glyphicon glyphicon-ok'></span> Email exists in database.</span>";
	}else{
		echo "<span class='badge' align='center'><span class='glyphicon glyphicon-remove'></span> Email not exists in database.</span>";
	}
}
?>