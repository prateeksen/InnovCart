<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-th-list"></span> Installed Theme</center></div>
  <div class="panel-footer">
	<div class="row">
	<?php
	$sql="SELECT * FROM themes WHERE theme_status!='1' ORDER BY theme_id DESC";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		while($row=$result->fetch_assoc()){
			echo '<a class="col-sm-3" style="text-decoration:none;" title="'.$row['theme_name'].'">
			<div class="list-group">
			  <div class="list-group-item active" align="center">';
				if(strlen($row['theme_name']) > 20){
					echo substr($row['theme_name'],0,17).'...';
				}else{
					echo $row['theme_name'];
				} 
			  echo '</div>
			
			  <div class="list-group-item" align="center"><img src="';
			  if($row['theme_snap']==NULL){
				  echo '../images/products/default.png';
			  }else{
				  echo '../themes/snaps/'.$row['theme_snap'];
			  }
			  echo '" style="height: 20%;width: 100%;"></div>
			   <div class="list-group-item"><table style="width:100%"><tbody><tr><th></th><td><a href="changetheme.php?id='.$row['theme_id'].'" class="btn btn-default btn-block">Apply Now</a></td></tr></tbody></table></div>
			</div>
			</a>';
		}
	}else{
		echo "<center>New Product till now</center>";
	}
	
	
	?>
</div>
  </div>
</div>