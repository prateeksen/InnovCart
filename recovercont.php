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
	if(isset($_GET['email']) and isset($_GET['randhash']) and isset($_GET['randmap'])){
		$email=strip_tags($conn->real_escape_string($_GET['email']));
		$hash=strip_tags($conn->real_escape_string($_GET['randhash']));
		$map=strip_tags($conn->real_escape_string($_GET['randmap']));
		if(time()-$map>600){
			$msg="<center>Link Expired.</center>";
		}else{
			$sql="SELECT * FROM members WHERE user_email='$email' and user_pass='$hash'";
			$result=$conn->query($sql);
			if($result->num_rows > 0){
				$confirm=1;
			}
		}
		
	}else if(isset($_POST['email']) and isset($_POST['hash']) and isset($_POST['map']) and isset($_POST['npass'])){
		$email=strip_tags($conn->real_escape_string($_POST['email']));
		$hash=strip_tags($conn->real_escape_string($_POST['hash']));
		$map=strip_tags($conn->real_escape_string($_POST['map']));
		$npass=md5($_POST['npass']);
		$sql="SELECT * FROM members WHERE user_email='$email' and user_pass='$hash'";
		$result=$conn->query($sql);
		if($result->num_rows > 0){
			$sql="UPDATE members SET user_pass='$npass' WHERE user_email='$email'";
			$result=$conn->query($sql);
			if($result) echo '<script>alert("Password Changed.");</script>';
			else echo '<script>alert("Some Error Occures.");</script>';
			$confirm=1;
		}
		
	}else{
		header('Location:404.php');
	}
?>

 <div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-option-horizontal"></span> Change Password</center></div>
  <div class="panel-footer">
	<div class="row">
		<?php 
			if(isset($msg)) echo $msg; 
			else if(isset($confirm)){
				echo '
				<form action="recover.php" method="POST">
				<table class="table table-hover">
				<tr><td>New Password </td><td>
				<input type="password" name="npass" class="form-control" />
				</td></tr>
				<tr><td></td><td>
				<input type="submit" name="chngpass" value="Change" class="btn btn-primary"/>
				<input type="hidden" name="email" value="'.$email.'" />
				<input type="hidden" name="hash" value="'.$hash.'" />
				<input type="hidden" name="map" value="'.$map.'" />
				</td></tr>
				</table>
				</form>';
			}else{
				header('Location:404.php');
			}
		?>
	</div>
  </div>
 </div>