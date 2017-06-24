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
	$user=$_SESSION['username'];
	$sql="SELECT * FROM videos,member_watch WHERE (watch_by='$user' and vid_id=watch_vid) and vid_id!='$id' ORDER BY RAND() LIMIT 1";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		echo '<div class="panel panel-primary">
  <div class="panel-body list-group-item active">Take a Look</div>
  <div class="panel-footer">
	<div class="row">';
		while($row=$result->fetch_assoc()){
			echo '<a class="col-sm-12" style="text-decoration:none;" title="'.$row['vid_name'].'" href="showproduct.php?id='.$row['vid_id'].'">
			<div class="list-group">
			  <div class="list-group-item active" align="center">';
				if(strlen($row['vid_name']) > 20){
					echo substr($row['vid_name'],0,17).'...';
				}else{
					echo $row['vid_name'];
				} 
			  echo '</div>
			
			  <div class="list-group-item" align="center"><img src="';
			  if($row['snapshot_link']==NULL){
				  echo './images/products/default.png';
			  }else{
				  echo $row['snapshot_link'];
			  }
			  echo '" style="height: 20%;width: 100%;"></div>
			  <div class="list-group-item"><table style="width:100%"><tbody><tr><th></th><td width="50%"><span class="badge">Rs. '.$row['vid_price'].'</span></a></td><td width="50%"><b><span class="glyphicon glyphicon-thumbs-up"></span> </b>'.$row['likes'].'</td></tr></tbody></table></div>
			   <div class="list-group-item"><table style="width:100%"><tbody><tr><th></th><td><a href="showproduct.php?id='.$row['vid_id'].'" class="btn btn-default btn-block">Buy Now</a></td></tr></tbody></table></div>
			</div>
			</a>';
		}
		echo '</div>
  </div>
 </div>';
	}
}
?>