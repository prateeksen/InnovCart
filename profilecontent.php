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
				$gender=$row['user_gender'];
				$uemail=$row['user_email'];
			}
		}
	}
?>
<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-user"></span> User Profile</center></div>
  <div class="panel-footer">
  		<form action="#" method="POST">
	<div class="row">
			<table class="table table-hover">
			<tr><td rowspan="3">
				<img src="images/<?php if($gender=="Male") echo 'muser.png'; else echo 'fuser.png'; ?>" />
			</td><td>Name </td><td><?php echo $fname.' '.$lname;?> </td>
			</td>
			<tr><td>Username </td><td>
			<?php echo $_SESSION['username']; ?>
			</td></tr>
			<tr><td>Email </td><td>
			<?php echo $uemail; ?>
			</td></tr>
			</table>
	</div>
			</form>
  
  </div>
 </div>
 
 <div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-thumbs-up"></span> Recent Activities</center></div>
  <div class="panel-footer">
	<div class="row">
	<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#watchhis">Watched Products</a></li>
    <li><a data-toggle="tab" href="#likehis">Liked Products</a></li>
  </ul>

  <div class="tab-content">
    <div id="watchhis" class="tab-pane fade in active">
      <p>
		<div class="row">
	<?php
					
					$suser=$_SESSION['username'];
					$sql="SELECT * FROM videos,member_watch WHERE watch_vid=vid_id and watch_by='$suser' ORDER BY watch_time DESC LIMIT 15"; 
					$rs_result = $conn->query($sql); //run the query
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		while($row=$result->fetch_assoc()){
			echo '<a class="col-sm-12" style="text-decoration:none;" title="'.$row['vid_name'].'" href="showproduct.php?id='.$row['vid_id'].'">
			<div class="list-group">
			
			  <div class="list-group-item" align="center">
			  <table class="table table-hover"><tr><td width="20%" rowspan="4"><img src="';
			  if($row['snapshot_link']==NULL){
				  echo './images/products/default.png';
			  }else{
				  echo $row['snapshot_link'];
			  }
			  echo '" style="height: 100px;width: 100px;">
			  </td><td><b>Watched on </b></td><td>'.$row['watch_time'].'</tr>
			  <tr></td><td><b>Name </b></td><td>'.$row['vid_name'].'</tr>
			  <tr><td><b>Price </b></td><td><span class="badge">Rs. '.$row['vid_price'].'</span></td></tr>
			  <tr><td><b><span class="glyphicon glyphicon-eye-open"></span> </b>'.$row['views'].'</b></td><td><span class="glyphicon glyphicon-thumbs-up"></span> </b>'.$row['likes'].'</td></tr>
			  </table>
			  </div>
			</div>
			</a>';
		}
	}else{
		echo "<center>New Video Watch History.</center>";
	}
	
	
	?>
</div>
	  </p>
    </div>
    <div id="likehis" class="tab-pane fade">
      <p>
				<div class="row">
			<?php
	
					$num_rec_per_page=10;
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
					$start_from = ($page-1) * $num_rec_per_page; 
					$sql="SELECT * FROM videos,member_likes WHERE like_vid=vid_id and like_by='$suser' ORDER BY like_time DESC LIMIT $start_from, $num_rec_per_page"; 
					$rs_result = $conn->query($sql); //run the query
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		while($row=$result->fetch_assoc()){
			echo '<a class="col-sm-12" style="text-decoration:none;" title="'.$row['vid_name'].'" href="showproduct.php?id='.$row['vid_id'].'">
			<div class="list-group">
			
			  <div class="list-group-item" align="center">
			  <table class="table table-hover"><tr><td width="20%" rowspan="4"><img src="';
			  if($row['snapshot_link']==NULL){
				  echo './images/products/default.png';
			  }else{
				  echo $row['snapshot_link'];
			  }
			  echo '" style="height: 100px;width: 100px;">
			  </td><td><b>Liked on </b></td><td>'.$row['like_time'].'</tr>
			  <tr><td><b>Name </b></td><td>'.$row['vid_name'].'</td></tr>
			  <tr><td><b>Price </b></td><td><span class="badge">Rs. '.$row['vid_price'].'</span></td></tr>
			  <tr><td><b><span class="glyphicon glyphicon-eye-open"></span> </b>'.$row['views'].'</b></td><td><span class="glyphicon glyphicon-thumbs-up"></span> </b>'.$row['likes'].'</td></tr>
			  </table>
			  </div>
			</div>
			</a>';
		}
	}else{
		echo "<center>New Liked Videos till now.</center>";
	}
	
	
	?>
</div>
	  </p>
    </div>
  </div>
  
  </div>
  
  </div>
 </div>
 