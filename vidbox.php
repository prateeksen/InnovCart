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
<div class="panel panel-default">
	<div class="panel-footer">
<?php
	$id=strip_tags($conn->real_escape_string($_GET['id']));
	$sql="SELECT * FROM videos WHERE vid_id='$id'";
	$result=$conn->query($sql);
	if($result->num_rows >0){
		while($row=$result->fetch_assoc()){
			echo '<div class="list-group-item" align="center"><img src="';
								   if($row['snapshot_link']==NULL){
				  echo './images/products/default.png';
			  }else{
				  echo $row['snapshot_link'];
			  }
			  echo '" style="height: 400px;width: 400px;"></div>';
		}
	}else{
		echo 'Erro 404! Not Found !';
	}
?>
<br/>
	<div class="sharethis-inline-share-buttons"></div>
	<br/>
	<ul class="list-group">
		<li class="list-group-item"><b><center><?php echo $vid_name; ?></center></b></li>
		<li class="list-group-item"><table style="width:100%"><tbody><tr><th></th><td width="50%"><b><span class="glyphicon glyphicon-eye-open"></span> </b><?php echo $vview; ?></td><td width="50%"><b><span class="glyphicon glyphicon-thumbs-up"   <?php if(!isset($_SESSION['username'])) echo 'data-toggle="modal" data-target="#myModal"'; else echo 'onclick="likeme(\''.$id.'\');"';?>></span> </b><div id="likers" style="display:inline;"><?php echo $vlike; ?>
		<?php 
		if(isset($_SESSION['username'])){
			$suser=$_SESSION['username'];
			$sql="SELECT like_by FROM member_likes WHERE like_vid='$id' and like_by='$suser'";
			$result=$conn->query($sql);
			if($result->num_rows > 0){
				echo ' <span class="badge">Product Liked</span>';
			}
		}
		
		?></div></td></tr></tbody></table></li>
		<li class="list-group-item">Category: <a href="viewsubcat.php?catid=<?php echo $cathname; ?>"><?php echo $cathname; ?></a></li>
		<li class="list-group-item">Tags : <?php $tags=explode(',',$vkeyword_tags);
			for($it=0;$it<count($tags);$it++)
			echo '<a href="search.php?term='.$tags[$it].'"><span class="badge">'.$tags[$it].'</span></a>';
		?></li>
	</ul>
	<ul class="list-group">
		<li class="list-group-item active">Product Specifications</li>
		<?php
			$sql="SELECT * FROM videos WHERE vid_id='$id'";
			$res=$conn->query($sql);
			while($row=$res->fetch_assoc()){
				if($row['vid_color']!=''){
					echo '<li class="list-group-item"><table style="width:100%"><tbody><tr><th></th><td width="50%"><b>Color</b></td><td width="50%">'.$row['vid_color'].'
		</div></td></tr></tbody></table></li>
		';
				}
				if($row['vid_size']!=''){
					echo '<li class="list-group-item"><table style="width:100%"><tbody><tr><th></th><td width="50%"><b>Size</b></td><td width="50%">'.$row['vid_size'].'
		</div></td></tr></tbody></table></li>
		';
				}
				if($row['vid_weight']!=''){
					echo '<li class="list-group-item"><table style="width:100%"><tbody><tr><th></th><td width="50%"><b>Weight</b></td><td width="50%">'.$row['vid_weight'].'
		</div></td></tr></tbody></table></li>
		';
				}
			}
		?>
		
	</ul>
		<?php
			$sql="SELECT vid_desc FROM videos WHERE vid_id='$id'";
			$res=$conn->query($sql);
			while($row=$res->fetch_assoc()){
				if($row['vid_desc']!=''){
					echo '<ul class="list-group">
		<li class="list-group-item active">Product Description</li>';
					echo '<li class="list-group-item"><table style="width:100%"><tbody><tr><th></th><td>'.$row['vid_desc'].'
		</div></td></tr></tbody></table></li>
		';
		echo '</ul>';
				}
			}
		?>
		
	
	</div>
</div>
<div class="panel panel-primary">
	<div class="panel-body list-group-item active">Related Products</div>
	<div class="panel-footer">
		<div class="row">
<?php
	$sql="SELECT * FROM videos WHERE (vid_by LIKE '%$vidby%' OR vid_keywords LIKE '%$vidby%' OR vid_name LIKE '%vidby%') and vid_id!='$id' ORDER BY rand() LIMIT 2";
	$result=$conn->query($sql);
	if($result->num_rows >0){
		while($row=$result->fetch_assoc()){
					echo '<a class="col-sm-6" style="text-decoration:none;" title="'.$row['vid_name'].'" href="showproduct.php?id='.$row['vid_id'].'">
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
	}else{
		echo 'No Related Products';
	}
?>
		</div>
	</div>
</div>
<?php include('vidboxmidads.php'); ?>
<div class="panel panel-primary">
	<div class="panel-body list-group-item active">Comments
	<?php
		$sql="SELECT COUNT(comment_id) as totalc FROM comments WHERE vid_id='$vid'";
		$result=$conn->query($sql);
		$row=$result->fetch_assoc();
		echo '('.$row['totalc'].')';
	?>
	</div>
	<div class="panel-footer">
		<div class="row">
			<input type="text" name="comment" class="form-control" placeholder="Type your comment and press enter" id="commentbox" onkeypress="comment(event);"/>
			<input type="hidden" id="commenter" value="<?php if(isset($_SESSION['username'])) echo $_SESSION['username']; else echo 'Guest'; ?>"/>
			<input type="hidden" id="vid" value="<?php echo $id;?>" />
			<div id="showsuccess">
				<table class="table table-striped">
				<?php 
					$num_rec_per_page=5;
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
					$start_from = ($page-1) * $num_rec_per_page; 
					$sql = "SELECT * FROM comments WHERE vid_id='$vid' ORDER BY comment_id DESC LIMIT $start_from, $num_rec_per_page"; 
					$rs_result = $conn->query($sql); //run the query
					
					while ($row =$rs_result->fetch_assoc()) { 
						echo '<tr><td><a href="viewprofile.php?user='.$row['comment_by'].'"><b>'.$row['comment_by'].'</b></td><td align="right">'.$row['comment_on'].'<td></tr>';
							echo '<tr><td colspan="2">'.$row['comment'].'</td></tr>';
					}
				?> 
				</table>
				<?php
				/*	$sql="SELECT * FROM comments WHERE vid_id='$id' ORDER BY comment_id DESC";
					$result=$conn->query($sql);
					echo '<table class="table table-striped">';
					if($result->num_rows > 0){
						while($row=$result->fetch_assoc()){
							echo '<tr><td><b>'.$row['comment_by'].'</b></td><td align="right">'.$row['comment_on'].'<td></tr>';
							echo '<tr><td colspan="2">'.$row['comment'].'</td></tr>';
						}
					}else{
						echo '<tr><td>No Comment. Be the First.</td></tr>';
					}
							echo '</table>';
					*/
				?>
				<center>
			<ul class="pagination">
				<?php 
					$sql = "SELECT * FROM comments WHERE vid_id='$vid' ORDER BY comment_id DESC"; 
					$rs_result = $conn->query($sql); //run the query
					$total_records = $rs_result->num_rows;  //count number of records
					$total_pages = ceil($total_records / $num_rec_per_page); 
					
					if($total_records>0)
					echo "<li><a href='showvideo.php?id=".$id."&page=1'>".'<'."</a></li> "; // Goto 1st page  

					for ($i=1; $i<=$total_pages; $i++) { 
								echo "<li><a href='showvideo.php?id=".$id."&page=".$i."'>".$i."</a></li> "; 
					}; 
					if($total_records>0)
					echo "<li><a href='showvideo.php?id=".$id."&page=$total_pages'>".'>'."</a></li> "; // Goto last page
				?>
			</ul></center>
			</div>
		</div>
	</div>
</div>


 <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login to Complete the action</h4>
        </div>
        <div class="modal-body">
          <p><input type="text" class="form-control" name="uemail" id="uemail" placeholder="Enter Email" /><br/>
			<input type="password" class="form-control" name="upass" id="upass" placeholder="Enter Password" /><br/>
			<button class="btn btn-primary" onclick="check();">Login</button>
			<a href="register.php" class="btn btn-primary">Register</a>
			<a href="forgot.php" class="btn btn-primary">Forgot Password</a>
			<div id="successshow"></div>
			</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" >Close</button>
        </div>
      </div>
      
    </div>
  </div>