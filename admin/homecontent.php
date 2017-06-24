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
  <div class="panel-body list-group-item active"><center><center> <span class="glyphicon glyphicon-stats"></span> Site Stats</center></div>
  <div class="panel-footer">
	<div class="row">
		<div class="col-sm-3">
				<ul class="list-group">
					<li class="list-group-item active"><center> <span class="glyphicon glyphicon-eye-open"></span> Total Views</center></li>
					<li class="list-group-item"><center>
						<?php
							$sql="SELECT SUM(views) as view FROM videos";
							$result=$conn->query($sql);
							$row=$result->fetch_assoc();
							echo $row['view'];
						?></center>
					</li>
				</ul>
		</div>
		<div class="col-sm-3">
				<ul class="list-group">
					<li class="list-group-item active"><center> <span class="glyphicon glyphicon-thumbs-up"></span> Total Likes</li>
					<li class="list-group-item"><center>
						<?php
							$sql="SELECT SUM(likes) as likeme FROM videos";
							$result=$conn->query($sql);
							$row=$result->fetch_assoc();
							echo $row['likeme'];
						?></center>
					</li>
				</ul>
		</div>
		<div class="col-sm-3">
				<ul class="list-group">
					<li class="list-group-item active"><center> <span class="glyphicon glyphicon-film"></span> Total Product</center></li>
					<li class="list-group-item"><center>
						<?php
							$sql="SELECT COUNT(vid_id) as vidme FROM videos";
							$result=$conn->query($sql);
							$row=$result->fetch_assoc();
							echo $row['vidme'];
						?></center>
					</li>
				</ul>
		</div>
		<div class="col-sm-3">
				<ul class="list-group">
					<li class="list-group-item active"><center> <span class="glyphicon glyphicon-film"></span> Pageviews</center></li>
					<li class="list-group-item"><center>
						<?php
							$sql="SELECT pageviews FROM website_attrib";
							$result=$conn->query($sql);
							$row=$result->fetch_assoc();
							echo $row['pageviews'];
						?></center>
					</li>
				</ul>
		</div>
		<div class="col-sm-3">
				<ul class="list-group">
					<li class="list-group-item active"><center> <span class="glyphicon glyphicon-user"></span> Members</center></li>
					<li class="list-group-item"><center>
						<?php
							$sql="SELECT COUNT(user_id) as idscount FROM members";
							$result=$conn->query($sql);
							$row=$result->fetch_assoc();
							echo $row['idscount'];
						?></center>
					</li>
				</ul>
		</div>
		<div class="col-sm-3">
				<ul class="list-group">
					<li class="list-group-item active"><center> <span class="glyphicon glyphicon-share"></span> Ads Click</center></li>
					<li class="list-group-item"><center>
						<?php
							$sql="SELECT SUM(ad_clicks) as totalclicks FROM ads";
							$result=$conn->query($sql);
							$row=$result->fetch_assoc();
							echo $row['totalclicks'];
						?></center>
					</li>
				</ul>
		</div>
		<div class="col-sm-3">
				<ul class="list-group">
					<li class="list-group-item active"><center> <span class="glyphicon glyphicon-shopping-cart"></span> Total Orders</center></li>
					<li class="list-group-item"><center>
						<?php
							$sql="SELECT COUNT(od_id) as totalod FROM orders";
							$result=$conn->query($sql);
							$row=$result->fetch_assoc();
							echo $row['totalod'];
						?></center>
					</li>
				</ul>
		</div>
		<div class="col-sm-3">
				<ul class="list-group">
					<li class="list-group-item active"><center> <span class="glyphicon glyphicon-gift"></span> Coupan Used</center></li>
					<li class="list-group-item"><center>
						<?php
							$sql="SELECT COUNT(od_coupan) as totalods FROM orders WHERE od_coupan!=''";
							$result=$conn->query($sql);
							$row=$result->fetch_assoc();
							echo $row['totalods'];
						?></center>
					</li>
				</ul>
		</div>
	</div>
  </div>
</div>
<ul class="list-group">
					<li class="list-group-item active"><center> <span class="glyphicon glyphicon-shopping-cart"></span> Latest Orders</center></li>
					<li class="list-group-item"><center>
	<div class="row">
		<?php
			$sql="SELECT * FROM members,orders WHERE od_by=user_id ORDER BY od_id DESC LIMIT 0,5";
			$result=$conn->query($sql);
			if($result->num_rows > 0){
				echo '<table class="table table-hover">';
				echo '<thead>
					  <tr>
						<th>Order ID</th>
						<th>Customer</th>
						<th>Status</th>
						<th>Date Added</th>
						<th>Total</th>
					  </tr>
					</thead>';
			while($row=$result->fetch_assoc()){
				
					echo '<tr>
						<td>'.$row['od_id'].'</td>
						<td>'.$row['user_username'].'</td>
						<td>';
							if($row['od_status']==4){
								echo 'Completed';
							}else{
								echo 'Pending';
							}
						echo '</td>
						<td>'.$row['od_date'].'</td>
						<td>Rs. '.$row['od_total'].'</td>
						 </tr>';
				
				
			}
			echo '</table>';
			}else{
				echo "No Orders Till Now.";
			}
		
		?>
	</li>
	</ul>