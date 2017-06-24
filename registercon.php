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
if(isset($_POST['register'])){
		if(!empty($_POST['password']) && !empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['mobile']) && !empty($_POST['gender']) && !empty($_POST['username'])){
		$fname=strip_tags($conn->real_escape_string($_POST['fname']));
		$lname=strip_tags($conn->real_escape_string($_POST['lname']));
		$email=strip_tags($conn->real_escape_string($_POST['email']));
		$mobile=strip_tags($conn->real_escape_string($_POST['mobile']));
		$gender=strip_tags($conn->real_escape_string($_POST['gender']));
		$username=strip_tags($conn->real_escape_string($_POST['username']));
		$password=md5($_POST['password']);
			$sql="INSERT INTO `members`(`user_email`, `user_username`, `user_fname`, `user_lname`, `user_mob`, `user_gender`, `user_pass`) VALUES ('$email','$username','$fname','$lname','$mobile','$gender','$password')";
			$result=$conn->query($sql);
			if($result){
				echo "<script>alert('Registered Successfully.');</script>";
			}else{
				echo "<script>alert('Some Error Occures.');</script>";
			}
	}else{
		echo "<script>alert('Please Fill all the fields.');</script>";
	}
}

?>
<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-user"></span> Register</center></div>
  <div class="panel-footer">
	<div class="row">
		<form action="#" method="POST">
		<table class="table table-hover"><tr><td>First Name</td><td>
		<input type="text" class="form-control" placeholder="First Name" name="fname" required/>
		</td><td width="30%"></td></tr>
		<tr><td>Last Name</td><td>
		<input type="text" class="form-control" placeholder="Last Name" name="lname" required/>
		</td><td></td></tr>
		<tr><td>Username</td><td>
		<input type="text" class="form-control" placeholder="Username" name="username" id="username" onkeydown="isavailuser()" onkeyup="isavailuser()" required/>
		</td><td><div id="isavailuser"></div></td></tr>
		<tr><td>Password</td><td>
		<input type="password" class="form-control" placeholder="Password" name="password" required/>
		</td><td></td></tr>
		<tr><td>Email</td><td>
		<input type="email" class="form-control" placeholder="Email" name="email" id="email" onkeyup="isavailemail()" onkeydown="isavailemail" required/>
		</td><td><div id="isavailemail"></div></td></tr>
		<tr><td>Mobile No.</td><td>
		<input type="text" class="form-control" placeholder="Mobile No." name="mobile" required/>
		</td><td></td></tr>
		<tr><td>Gender</td><td>
		<select name="gender" class="form-control" required>
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select>
		</td><td></td></tr>
		<tr><td></td><td>
		<input type="submit" class="btn btn-primary" value="Register" name="register"/>
		</td><td></td></tr>
		</table>
		</form>
	</div>
  </div>
</div>