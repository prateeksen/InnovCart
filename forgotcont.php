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
if(isset($_POST['forgot'])){
		if(!empty($_POST['email'])){
		$email=$_POST['email'];
			$sql="SELECT * FROM `members` WHERE user_email='$email'";
			$result=$conn->query($sql);
			if($result->num_rows > 0){
				$row=$result->fetch_assoc();
				$fname=$row['user_fname'];
				$lname=$row['user_lname'];
				$pass=$row['user_pass'];
				$email=$row['user_email'];
				
				$header="Password Change Request";
				$msg='Hello '.$fname.' '.$lname.',<br/> Someone have requested for password change for your account.<br/> If it was you, then please follow this link for password change<br/>
				<a href="http://'.$_SERVER['SERVER_NAME'].'/recover.php?email='.$email.'&randhash='.$pass.'&randmap='.time().'">Change Password</a><br>
				<b>Note : </b>Link will work for next 10 minutes.<br/><br/>
				Regards,<br/>
				Admin';

				$headers = "From: admin@".$_SERVER['SERVER_NAME']."" . "\r\n";

				mail($email,$header,$msg,$headers);

				echo "<script>alert('Password Recovery Mail Sent to your email.');</script>";
			}else{
				echo "<script>alert('Some Error Occures.');</script>";
			}
	}else{
		echo "<script>alert('Please Fill all the fields.');</script>";
	}
}

?>
<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-search"></span> Forgot Password</center></div>
  <div class="panel-footer">
	<div class="row">
		<form action="#" method="POST">
		<table class="table table-hover">
		<tr><td>Email</td><td>
		<input type="email" class="form-control" placeholder="Email" name="email" id="email" onkeyup="isexistemail()" onkeydown="isavailemail" autocomplete="off" required/>
		</td><td width="30%"><div id="isexistemail"></div></td></tr>
		<tr><td></td><td>
		<input type="submit" class="btn btn-primary" value="Send Mail" name="forgot"/>
		</td><td></td></tr>
		</table>
		</form>
	</div>
  </div>
</div>