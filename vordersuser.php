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
	if(isset($_GET['delete'])){
		$id=$_GET['delete'];
		$sql="SELECT * FROM orders_products WHERE od_ide='$id'";
		$result=$conn->query($sql);
		while($row=$result->fetch_assoc()){
			$quant=$row['od_prod_quant'];
			$prodid=$row['od_prod_realid'];
			$sql4="SELECT vid_quant FROM videos WHERE vid_id='$prodid'";
			$result4=$conn->query($sql4);
			if($result4){
				while($row4=$result4->fetch_assoc()){
					$quant=$quant+$row4['vid_quant'];
				}
			}
			$sql2="UPDATE videos SET vid_quant='$quant' WHERE vid_id='$prodid'";
			$result2=$conn->query($sql2);
			if($result2){
				$sql3="DELETE FROM orders_products WHERE od_ide='$id'";
				$result3=$conn->query($sql3);
				if($result3){
					$sql3="DELETE FROM orders WHERE od_id='$id'";
					$result3=$conn->query($sql3);
					if($result3){
						echo '<script>alert("Successfully Deleted.");</script>';
					}
				}
			}	
		}
		
		
		
	}
?>
<div class="panel panel-primary">
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-file"></span> Detail of Order ID #<?php echo $_GET['id']; ?></center></div>
  <div class="panel-footer">
  <div class="list-group">
	<div class="list-group-item" align="left">
	  <div class="row">
		<div class="col-sm-4">
		<b>Shipping Address</b><br/>
		<?php
			$sql="SELECT * FROM orders WHERE od_id='$orderid'";
			$result=$conn->query($sql);
			while($row=$result->fetch_assoc()){
				echo $row['od_fname']." ".$row['od_lname']."<br/>";
				echo $row['od_addr_one'].'<br/>';
				if($row['od_addr_two']!=NULL)
				echo $row['od_addr_two'].'<br/>';
				echo $row['od_city'].' '.$row['od_state'].' '.$row['od_post_code'].'<br/>';
				echo $row['od_country'];
				
			}
		
		?>
		</div>
		<div class="col-sm-4">
		<b>Payment Method</b><br/>
		<?php
			$sql="SELECT * FROM orders WHERE od_id='$orderid'";
			$result=$conn->query($sql);
			while($row=$result->fetch_assoc()){
				
				if($row['od_pmethod']!="cod")
				echo 'Cash on Delivery<br/>';
			}
		
		?>
		</div>
		<div class="col-sm-4">
		<b>Order Summary</b><br/>
		<?php
			$sql="SELECT * FROM orders WHERE od_id='$orderid'";
			$result=$conn->query($sql);
			while($row=$result->fetch_assoc()){
				$scup=substr($row['od_coupan'],0,2);
				if($row['od_pmethod']!="cod")
				echo 'Item(s) Subtotal: Rs. '.$row['od_subtotal'].'<br/>';
				echo 'Shipping: Rs. '.$row['od_ship'].'<br/>';
				if($row['od_coupan']!=NULL){
				echo 'Total: Rs. '.$row['od_total'].'<br/>';
				echo 'Coupan Discount: Rs. '.($row['od_subtotal']*(int)$scup/100 ).'<br/>';
				echo '<b>Grand Total: Rs. '.($row['od_total']-($row['od_subtotal']*(int)$scup/100 )).'</b><br/>';
				}else{
				echo '<b>Grand Total: Rs. '.$row['od_total'].'</b><br/>';
				}
			}
		
		?>
		</div>
	  </div>
	  </div>
	</div>
	<div class="list-group">
	<div class="list-group-item" align="left">
	  <div class="row">
		<div class="col-sm-12">
			<div class="progress">
			<?php
			$sql="SELECT od_status FROM orders WHERE od_id='$orderid'";
			$result=$conn->query($sql);
			while($row=$result->fetch_assoc()){
				$status=$row['od_status'];
			}
			
			if($status==0){
				echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25"
			  aria-valuemin="0" aria-valuemax="100" style="width:10%">
				Order Placed
			  </div>';
			}else if($status==1){
				echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25"
			  aria-valuemin="0" aria-valuemax="100" style="width:25%">
				Product Shipped
			  </div>';
			}else if($status==2){
				echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25"
			  aria-valuemin="0" aria-valuemax="100" style="width:50%">
				In between Stations
			  </div>';
			}else if($status==3){
				echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25"
			  aria-valuemin="0" aria-valuemax="100" style="width:75%">
				Out for delivery
			  </div>';
			}else{
				echo '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="25"
			  aria-valuemin="0" aria-valuemax="100" style="width:100%">
				Delivered.
			  </div>';
			}
		
		   ?>
			</div>
		</div>
	  </div>
	</div>
	</div>
	<div class="row">
	<?php
		$suser=$_SESSION['username'];
		$sql="SELECT user_id FROM members WHERE user_username='$suser'";
		$result=$conn->query($sql);
		while($row=$result->fetch_assoc()){
			$umyid=$row['user_id'];
		}
					$num_rec_per_page=10;
					if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
					$start_from = ($page-1) * $num_rec_per_page; 
					$sql="SELECT * FROM videos,orders_products WHERE vid_id=od_prod_realid and od_ide='$orderid' LIMIT $start_from, $num_rec_per_page"; 
					$rs_result = $conn->query($sql); //run the query
					// echo $rs_result->num_rows;
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		while($row=$result->fetch_assoc()){
			echo '
			<div class="list-group">
			
			  <div class="list-group-item" align="center">
			  <table class="table table-hover"><tr><td width="20%" rowspan="5"><img src="';
			  if($row['snapshot_link']==NULL){
				  echo './images/products/default.png';
			  }else{
				  echo $row['snapshot_link'];
			  }
			  echo '" style="height: 100px;width: 100px;">
			  </td><td><b>Name </b></td><td>'.$row['vid_name'].'</tr>
			  <tr><td><b>Ordered On </b></td><td><span class="badge">Rs. '.$row['od_date'].'</span></td></tr>';
			  if($row['od_coupan']!=NULL){
				  echo '
			  <tr><td><b>Price </b></td><td><span class="badge">Rs. '.$row['od_prod_price'].'</span></tr>';
			  }else{
				  
			  echo '<tr><td><b>Price </b></td><td><span class="badge">Rs. '.$row['od_prod_price'].'</span></td></tr>';
			  }
			  
			  echo '<tr><td><b>Quantity </b></td><td><span class="badge">'.$row['od_prod_quant'].'</span></td></tr>
			  </table>
			  </div>
			</div>
			';
		}
	}else{
		echo "<center>No Orders till now.</center>";
	}
	
	
	?>
</div>
	<div class="row">
		<center>
			<ul class="pagination">
				<?php 
					$sql = "SELECT * FROM videos,member_likes WHERE like_vid=vid_id and like_by='$suser' ORDER BY like_time DESC"; 
					$rs_result = $conn->query($sql); //run the query
					$total_records = $rs_result->num_rows;  //count number of records
					$total_pages = ceil($total_records / $num_rec_per_page); 
					
					if($total_records>0)
					echo "<li><a href='ordersuser.php?&page=1'>".'<'."</a></li> "; // Goto 1st page  

					for ($i=1; $i<=$total_pages; $i++) { 
								echo "<li><a href='ordersuser.php?&page=".$i."'>".$i."</a></li> "; 
					}; 
					if($total_records>0)
					echo "<li><a href='ordersuser.php?&page=$total_pages'>".'>'."</a></li> "; // Goto last page
				?>
			</ul></center>
</div>
  
  </div>
 </div>
 