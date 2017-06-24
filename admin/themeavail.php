<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-th-list"></span> Available Theme</center></div>
  <div class="panel-footer">
	<center>
	<table class="table table-hover">
						<thead>
												  <tr>
													<th>Name</th>
													<th>Install</th>
												  </tr>
												</thead>
		<?php
		$dir = "../themes/";

		// Open a directory, and read its contents
		if (is_dir($dir)){
		  if ($dh = opendir($dir)){
			while (($file = readdir($dh)) !== false){
				$info = new SplFileInfo($file);
				$type=$info->getExtension();
				if(is_file($dir.$file) && $type == "css"){
					  $sql="SELECT * FROM themes WHERE NOT EXISTS (SELECT * FROM themes WHERE theme_location='$file')";
					  $result=$conn->query($sql);
					  if($result->num_rows > 0){
						  
						  
						  					$realfilename=explode('.',$file)[0];
												
												echo '<tr>
													<td>'.$realfilename.'</td>
													<td id="showsuccess"><a class="btn btn-danger" id="'.$realfilename.'" onclick="install('.$realfilename.');"><span class="glyphicon glyphicon-upload"></span> Install</a></td>
													</tr>';
											
					  }
				}
			}
			closedir($dh);
		  }
		}
			
			
		?>
		</table>
	</center>
  </div>
</div>

