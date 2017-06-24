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
	if(isset($_POST['chngpass'])){
		$cpass=md5($_POST['cpass']);
		$npass=md5($_POST['npass']);
		$suser=$_SESSION['user'];
		
		$sql="SELECT admin_pass FROM admin_details WHERE admin_user='$suser'";
		$result=$conn->query($sql);
		$row=$result->fetch_assoc();
		if($row['admin_pass']!=$cpass){
			echo '<script>alert("Wrong Old Password.");</script>';
		}else if($row['admin_pass']==$npass){
			echo '<script>alert("New Password and Old Password are Same");</script>';
		}else{
			$sql="UPDATE admin_details SET admin_pass='$npass' WHERE admin_user='$suser'";
			$result=$conn->query($sql);
			if($result){
				echo '<script>alert("Password Updated.");</script>';
			}
		}
		
	}
?>
 <div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-option-horizontal"></span> Change Password</center></div>
  <div class="panel-footer">
  		<form action="#" method="POST">
	<div class="row">
			<table class="table table-hover">
			<tr><td>Current Password </td><td>
			<input type="password" name="cpass" class="form-control" />
			</td></tr>
			<tr><td>New Password </td><td>
			<input type="password" name="npass" class="form-control" />
			</td></tr>
			<tr><td></td><td>
			<input type="submit" name="chngpass" value="Update" class="btn btn-primary"/>
			</td></tr>
			</table>
	</div>
			</form>
  
  </div>
 </div>