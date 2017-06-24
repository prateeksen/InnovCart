<?php

if(isset($_GET['id'])){
	$ide=$_GET['id'];
	$sql="UPDATE themes SET theme_status='0'";
	$result=$conn->query($sql);
	if($result){
		
		$sql3="SELECT * FROM themes WHERE theme_id='$ide'";
		$result3=$conn->query($sql3);
		$row3=$result3->fetch_assoc();
		$source=$row3['theme_location'];
		$source='..\themes\\'.$source;
		if(copy($source,'..\css\style.css')){
					$sql2="UPDATE themes SET theme_status='1' WHERE theme_id='$ide'";
					$result2=$conn->query($sql2);
					if($result2){
						echo '<script>alert("Theme Updated.");</script>';
					}
		}else{
			echo 'Some Error Occures';
		}
	}
}
?>
<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-th-list"></span> Current Theme</center></div>
  <div class="panel-footer">
	<center>
		<?php
			$sql="SELECT * FROM themes WHERE theme_status='1'";
			$result=$conn->query($sql);
			$row=$result->fetch_assoc();
			$image=$row['theme_snap'];
			$name=$row['theme_name'];
			echo '<img src="../themes/snaps/'.$row['theme_snap'].'" width="200px" height="200px" alt="'.$name.'"/><br/>';
			echo '<b>'.$name.'</b>';
		?>
	</center>
  </div>
</div>