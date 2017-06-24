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
	if(isset($_POST['basicsubmit'])){
		$ufname=strip_tags($conn->real_escape_string($_POST['fname']));
		$ulname=strip_tags($conn->real_escape_string($_POST['lname']));
		$umobile=strip_tags($conn->real_escape_string($_POST['mobile']));
		$suser=$_SESSION['username'];
		$sql="UPDATE members SET user_fname='$ufname',user_lname='$ulname',user_mob='$umobile' WHERE user_username='$suser'";
		$result=$conn->query($sql);
		if($result){
			echo '<script>alert("Details Updated.");</script>';
		}
	}
?>
<?php
	if(isset($_SESSION['username'])){
		$usrnm=$_SESSION['username'];
		$sql="SELECT * FROM members WHERE user_username='$usrnm'";
		$result=$conn->query($sql);
		if($result->num_rows > 0){
			while($row=$result->fetch_assoc()){
				$fname=$row['user_fname'];
				$lname=$row['user_lname'];
				$mobile=$row['user_mob'];
				$pass=$row['user_pass'];
			}
		}
	}
?>
<?php 
	if(isset($_POST['chngpass'])){
		$cpass=md5($_POST['cpass']);
		$npass=md5($_POST['npass']);
		$suser=$_SESSION['username'];
		
		$sql="SELECT user_pass FROM members WHERE user_username='$usrnm'";
		$result=$conn->query($sql);
		$row=$result->fetch_assoc();
		if($row['user_pass']!=$cpass){
			echo '<script>alert("Wrong Old Password.");</script>';
		}else if($row['user_pass']==$npass){
			echo '<script>alert("New Password and Old Password are Same");</script>';
		}else{
			$sql="UPDATE members SET user_pass='$npass' WHERE user_username='$suser'";
			$result=$conn->query($sql);
			if($result){
				echo '<script>alert("Password Updated.");</script>';
			}
		}
		
	}
?>
<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-cog"></span> Basic Settings</center></div>
  <div class="panel-footer">
  		<form action="#" method="POST">
	<div class="row">
			<table class="table table-hover">
			<tr><td>First Name </td><td>
			<input type="text" name="fname" class="form-control" value="<?php echo $fname; ?>"/>
			</td></tr>
			<tr><td>Last Name </td><td>
			<input type="text" name="lname" class="form-control" value="<?php echo $lname; ?>"/>
			</td></tr>
			<tr><td>Mobile </td><td>
			<input type="text" name="mobile" class="form-control" value="<?php echo $mobile; ?>"/>
			</td></tr>
			<tr><td></td><td>
			<input type="submit" name="basicsubmit" value="Update" class="btn btn-primary"/>
			</td></tr>
			</table>
	</div>
			</form>
  
  </div>
 </div>
 
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
 