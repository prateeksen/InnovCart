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
	if(isset($_POST['tlogin'])){
		$uemail=strip_tags($conn->real_escape_string($_POST['temail']));
		$upass=md5($_POST['tpwd']);
		
		$sql="SELECT * FROM members WHERE user_email='$uemail' and user_pass='$upass'";
		$result=$conn->query($sql);
		$row=$result->fetch_assoc();
		if($result->num_rows > 0){
			session_start();
			$_SESSION['email']=$uemail;
			$_SESSION['username']=$row['user_username'];
		}else{
			echo '<script> alert("Wrong Password/Email Combination.");</script>';
		}
	}
?>
<nav class="navbar navbar-inverse" style="border-radius: 0px;">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php"><?php 
	  if($weblogo==NULL)
		  echo $website_name;
	  else
		echo '<img src="'.$weblogo.'">'; ?></a>
    </div>
	<?php
	// Taking Data For Cat and SubCats
	$sql="SELECT * FROM categories";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc()){
		$catname=$row['cat_name'];
		$subsql="SELECT * FROM subcat WHERE cat_name='$catname'";
		$subresult=$conn->query($subsql);
		echo '<ul class="nav navbar-nav">
				<li class="dropdown">';
		if($subresult->num_rows > 0){
			echo '<a class="dropdown-toggle" data-toggle="dropdown"> '.$row['cat_name'];
			echo'		<span class="caret"></span></a>
				<ul class="dropdown-menu" style="width:200%">';
			while($subrow=$subresult->fetch_assoc()){
				echo '<li><a href="viewinside.php?subcat='.$subrow['subcat_id'].'">'.$subrow['subcat_name'].'</a></li>';
			}
			echo'</ul></a> ';
		}else{
			echo '<a href="viewsubcat.php?catid='.$row['cat_name'].'"> '.$row['cat_name'].'</a>';
		}	  
		
		echo '
			  </li>
			</ul>';
	}
	?>
    <ul class="nav navbar-nav navbar-right">
		  <?php
			echo '<li class="dropdown">
					  <a href="showcart.php"  ><span class="glyphicon glyphicon-shopping-cart"></span> Your Cart <span class="badge"><div id="added">';
					  if(isset($_SESSION['shop_cart'])){
						  echo count($_SESSION['shop_cart']);
					  }else{
						  echo '0';
					  }
					  echo '</div></span></a>
					  </li>';
		  
		  
		  ?>
		<li>
			   <form class="navbar-form navbar-left" action="search.php" method="GET">
			  <div class="form-group">
				<input type="text" class="form-control" placeholder="Search" name="term">
			  </div>
			  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search" style="padding:15%;"></span></button>
			</form>
		</li>
		<?php
			if(isset($_SESSION['username'])){
				echo '<li class="dropdown">
					  <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> '.$_SESSION['username'].'
						<span class="caret"></span></a>
						<ul class="dropdown-menu" style="width:200%">
						<div class="list-group">
									<a href="profile.php" class="list-group-item">Profile</a>
									<a href="likehistory.php" class="list-group-item">Liked Products</a>
									<a href="viewhistory.php" class="list-group-item">Watched Products</a>
									<a href="orders.php" class="list-group-item">Your Orders</a>
									<a href="usersetting.php" class="list-group-item">Settings</a>
								  <a href="logout.php" class="list-group-item" id="tlogin" name="tlogin">Logout</a>
						</div>
						</ul>
					  </li>';
			}else{
				echo '<li class="dropdown">
					  <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Members Login
						<span class="caret"></span></a>
						<ul class="dropdown-menu" style="width:200%">
							<form role="form" method="POST" action="index.php" class="col-sm-12">
							<li>
										<div class="form-group">
									<label for="temail">Email address:</label>
									<input type="email" class="form-control" id="temail" name="temail">
								  </div>
							</li>
							<li>
							<div class="form-group">
									<label for="tpwd">Password:</label>
									<input type="password" class="form-control" id="tpwd" name="tpwd">
								  </div>
							</li>
							<li>
								  <button type="submit" class="btn btn-info" id="tlogin" name="tlogin">Login</button>
								  <a href="register.php" class="btn btn-info">Register</a>
								  <a href="forgot.php" class="btn btn-info">Forgot Password</a>
							</li> 
							</form>
						</ul>
					  </li>';
			}
		
		?>
	 
    </ul>
  </div>
</nav>