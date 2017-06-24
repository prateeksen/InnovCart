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
<div class="panel panel-primary">
  <div class="panel-body list-group-item active">Search Result for "<b><?php echo $_GET['term']; ?></b>"</div>
  <div class="panel-footer">
	<div class="row">
	<?php 
					$num_rec_per_page=12;
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
					$start_from = ($page-1) * $num_rec_per_page; 
					$sql = "SELECT * FROM videos WHERE vid_name LIKE '%$term%' OR vid_keywords LIKE '%$term%' OR vid_by LIKE '%$term%' ORDER BY views DESC LIMIT $start_from, $num_rec_per_page"; 
					$rs_result = $conn->query($sql); //run the query
					
					if($rs_result->num_rows>0){
					while ($row =$rs_result->fetch_assoc()) { 
							echo '<a class="col-sm-3" style="text-decoration:none;" title="'.$row['vid_name'].'" href="showproduct.php?id='.$row['vid_id'].'">
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
						echo '<center>No Video found for search term '.$term.'.</center>';
					}
				?>
	<?php
	/*$sql="SELECT * FROM videos ORDER BY views DESC LIMIT 4";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		while($row=$result->fetch_assoc()){
			echo '<a class="col-sm-3" style="text-decoration:none;" title="'.$row['vid_name'].'" href="showvideo.php?id='.$row['vid_id'].'">
			<div class="list-group">
			  <div class="list-group-item active" align="center">';
				if(strlen($row['vid_name']) > 20){
					echo substr($row['vid_name'],0,17).'...';
				}else{
					echo $row['vid_name'];
				} 
			  echo '</div>
			
			  <div class="list-group-item" align="center"><img src="';
			  if($row['is_youtube']=="yes"){
				  echo 'https://i.ytimg.com/vi/'.$row['youtube_link'].'/hqdefault.jpg';
			  }else{
				  echo 'nothing';
			  }
			  echo '" style="height: 20%;width: 100%;"></div>
			  <div class="list-group-item"><table style="width:100%"><tbody><tr><th></th><td width="50%"><b>Length : </b></td><td width="50%"><span class="badge">'.$row['vid_length'].'</span></a></td></tr></tbody></table></div>
			   <div class="list-group-item"><table style="width:100%"><tbody><tr><th></th><td width="50%"><b><span class="glyphicon glyphicon-eye-open"></span> </b>'.$row['views'].'</td><td width="50%"><b><span class="glyphicon glyphicon-thumbs-up"></span> </b>'.$row['likes'].'</td></tr></tbody></table></div>
			</div>
			</a>';
		}
	}else{
		echo "<center>New Videos till now</center>";
	}
	
	*/
	?></div>
	<div class="row">
		<center>
			<ul class="pagination">
				<?php 
					$sql = "SELECT * FROM videos WHERE vid_name LIKE '%$term%' ORDER BY views DESC "; 
					$rs_result = $conn->query($sql); //run the query
					$total_records = $rs_result->num_rows;  //count number of records
					$total_pages = ceil($total_records / $num_rec_per_page); 
					
					if($total_records>0)
					echo "<li><a href='search.php?term=".$term."&page=1'>".'<'."</a></li> "; // Goto 1st page  

					for ($i=1; $i<=$total_pages; $i++) { 
								echo "<li><a href='search.php?term=".$term."&page=".$i."'>".$i."</a></li> "; 
					}; 
					if($total_records>0)
					echo "<li><a href='search.php?term=".$term."&page=$total_pages'>".'>'."</a></li> "; // Goto last page
				?>
			</ul></center>
</div>
  
  </div>
 </div>