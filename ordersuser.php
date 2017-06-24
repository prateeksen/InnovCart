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
  <div class="panel-body list-group-item active"><center><span class="glyphicon glyphicon-thumbs-up"></span> Your Orders</center></div>
  <div class="panel-footer">
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
					$sql="SELECT * FROM orders WHERE od_by='$umyid' ORDER BY od_date DESC LIMIT $start_from, $num_rec_per_page"; 
					$rs_result = $conn->query($sql); //run the query
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		while($row=$result->fetch_assoc()){
			echo '<a class="col-sm-12" style="text-decoration:none;" title="'.$row['vid_name'].'" href="vieworder.php?id='.$row['od_id'].'">
			<div class="list-group">
			
			  <div class="list-group-item" align="center">
			  <table class="table table-hover"><tr><td width="20%" ';
			  if($row['od_coupan']!=NULL)
			  echo 'rowspan="5"';
			  else
				echo 'rowspan="4"';
			  
			  echo '><img src="';
			  if($row['snapshot_link']==NULL){
				  echo './images/products/default.png';
			  }else{
				  echo $row['snapshot_link'];
			  }
			  echo '" style="height: 100px;width: 100px;">
			  </td><td><b>Order Id </b></td><td colspan="2">#'.$row['od_id'].'</tr>
			  <tr><td><b>Ordered On </b></td><td colspan="2"><span class="badge">Rs. '.$row['od_date'].'</span></td></tr>
			  <tr><td><b>Price </b></td><td colspan="2"><span class="badge">Rs. '.$row['od_total'].'</span></td></tr>';
			  if($row['od_coupan']!=NULL)
			  echo '<tr><td><b>Coupan </b></td><td colspan="2"><span class="badge">'.$row['od_coupan'].'</span></td></tr>';
			  echo '<tr><td><b></b><a href="orders.php?delete='.$row['od_id'].'" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Cancel</a></b></td><td><a href="vieworder.php?id='.$row['od_id'].'" class="btn btn-info"><span class="glyphicon glyphicon-eye-open"></span> View Order</a></td><td><a href="printinvoice.php?id='.$row['od_id'].'" target="_blank" class="btn btn-info"><span class="glyphicon glyphicon-print"></span> Print Invoice</a></td></tr>
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
	<div class="row">
		<center>
			<ul class="pagination">
				<?php 
					$sql = "SELECT * FROM orders WHERE od_by='$umyid' ORDER BY od_date DESC"; 
					$rs_result = $conn->query($sql); //run the query
					$total_records = $rs_result->num_rows;  //count number of records
					$total_pages = ceil($total_records / $num_rec_per_page); 
					
					if($total_records>0)
					echo "<li><a href='orders.php?&page=1'>".'<'."</a></li> "; // Goto 1st page  

					for ($i=1; $i<=$total_pages; $i++) { 
								echo "<li><a href='orders.php?&page=".$i."'>".$i."</a></li> "; 
					}; 
					if($total_records>0)
					echo "<li><a href='orders.php?&page=$total_pages'>".'>'."</a></li> "; // Goto last page
				?>
			</ul></center>
</div>
  
  </div>
 </div>
 