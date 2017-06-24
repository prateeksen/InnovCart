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
	if(isset($_POST['newsubmit'])){
		$youcat=$_POST['youcat'];
		$yousubcat=$_POST['yousubcat'];
		$youname=$_POST['youname'];
		$youlengthhh=$_POST['youlengthhh'];
		$youlengthmm=$_POST['youlengthmm'];
		$youlengthss=$_POST['youlengthss'];
		$youkey=$_POST['youkey'];
		$youby=$_POST['youby'];
		$yourobots=$_POST['yourobots'];
		$youlink=$_POST['youlink'];
		$youvc=$_POST['youvc'];
		$youlc=$_POST['youlc'];
		
		$youlength=$youlengthhh.":".$youlengthmm.":".$youlengthss;
		
		$thumbnail_medium_url='https://api.dailymotion.com/video/'.$youlink.'?fields=thumbnail_medium_url';
		$json_thumbnail = file_get_contents($thumbnail_medium_url);
		$get_thumbnail = json_decode($json_thumbnail, TRUE);
		$thumb=$get_thumbnail['thumbnail_medium_url'];
		
		$sql="INSERT INTO `videos`(`subcat_id`, `cat_name`, `is_dailymotion`, `dailymotion_link`, `views`, `likes`, `snapshot_link`, `vid_length`, `vid_name`, `vid_keywords`, `vid_robots`, `vid_by`) VALUES ('$yousubcat','$youcat','yes','$youlink','$youvc','$youlc','$thumb','$youlength','$youname','$youkey','$yourobots','$youby')";
		if($result=$conn->query($sql)){
			echo "<script>alert('Video Uploaded.');</script>";
		}else{
			echo "<script>alert('Some Error Occures.');</script>";
		}
	}

?>
<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-upload"></span> Add Video</center></div>
  <div class="panel-footer">
					<ul class="nav nav-pills">
					  <li><a href="addvideo.php">Upload From PC</a></li>
					  <li><a href="youtube.php">Youtube Upload</a></li>
					  <li><a href="vimeo.php">Vimeo Upload</a></li>
					  <li class="active"><a href="dailymotion.php">Dailymotion Upload</a></li>
					</ul><hr/>
	<form action="#" method="POST">
		<table class="table table-hover">
			<tr class="alert-success">
				<td>Category</td>
				<td colspan="3">
					<select name="youcat" class="form-control" onchange="opensub(this.value);" required>
						<option value="error">- Select Category -</option>';
						<?php
							$sql="SELECT cat_name FROM `categories`";
							$result=$conn->query($sql);
							while($row=$result->fetch_assoc()){
								echo '<option value="'.$row['cat_name'].'">'.$row['cat_name'].'</option>';
							}
						?>
					</select>
				</td>
			</tr>
			<tr class="alert-warning">
				<td>Sub-Category</td>
				<td colspan="3">
					<select class="form-control" name="yousubcat" id="showsuccess">
					</select>	
				</td>
			</tr>
			<tr class="alert-success">
				<td>Video Name</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Name" name="youname" /></td>
			</tr>
			<tr class="alert-warning">
				<td width="50%">Video Length</td>
				<td width="17%"><input type="text" class="form-control" placeholder="HH" name="youlengthhh" /></td>
				<td width="17%"><input type="text" class="form-control" placeholder="MM" name="youlengthmm" /></td>
				<td width="16%"><input type="text" class="form-control" placeholder="SS" name="youlengthss" /></td>
			</tr>
			<tr class="alert-success">
				<td>Video Keywords</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Keywords Seperated by (,)" name="youkey" /></td>
			</tr>
			<tr class="alert-warning">
				<td>Video Made By</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Name for ex : Taylor Swaift" name="youby" /></td>
			</tr>
			<tr class="alert-success">
				<td>Video Robots</td>
				<td colspan="3">
					<select name="yourobots" class="form-control">
								<option value="follow,index">follow,index</option>
								<option value="nofollow,index">nofollow,index</option>
								<option value="follow,noindex">follow,noindex</option>
								<option value="nofollow,noindex">nofollow,noindex</option>
							</select>
				</td>
			</tr>
			<tr class="alert-warning">
				<td>Dailymotion Link</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="Enter Link [for ex : x4dm5it]" name="youlink" /></td>
			</tr>
			<tr class="alert-success">
				<td>Starting View Count</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="as default 0" name="youvc" /></td>
			</tr>
			<tr class="alert-warning">
				<td>Starting Like Count</td>
				<td colspan="3"><input type="text" class="form-control" placeholder="as default 0" name="youlc" /></td>
			</tr>
			<tr class="alert-success">
				<td></td>
				<td colspan="3"><input type="submit" class="btn btn-primary" value="Add" name="newsubmit" /></td>
			</tr>
		</table>
	</form>
  </div>
</div>