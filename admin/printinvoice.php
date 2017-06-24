<?php
	//error_reporting(0);
	session_start();
	include('../conn/conn.php');
	$orderid=$_GET['id'];
	$sql="SELECT * FROM website_attrib";
	$result=$conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row=$result->fetch_assoc()){
			$website_name=$row['web_name'];
			$copyright_tags=$row['web_copy'];
			$wfacebook=$row['web_facebook'];
			$weblogo=$row['web_logo'];
			$webfev=$row['web_fev'];
			$pageviews=$row['pageviews'];
			$web_desc=$row['web_des'];
		}
	}
	
?>
<head>
		<title><?php echo $website_name;?> - <?php echo $web_desc;?></title>
		<link rel="icon" href="<?php if($webfev!=NULL) echo $webfev;?>">
		<meta name="description" content="<?php echo $vid_name;?>" />
		<meta name="keywords" content="<?php echo $vkeyword_tags;?>" />
		<meta name="robots" content="<?php echo $vrobot_tags;?>" />
		<meta name="copyright" content="<?php echo $copyright_tags;?>" />
		<meta name="DC.title" content="<?php echo $vid_name;?>" />
		<link rel="stylesheet" href="../css/style.css">
		<script src="../css/bjs.js"></script>
		<script src="../css/bjs2.js"></script>
		<script src="../js/addon.js"></script>
		<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=58f5b3b7dec37d00122423bc&product=inline-share-buttons"></script>
		<script type="text/javascript">
			function addtocart()
			{
				var quant=document.getElementById('quant').value;
				var vid=document.getElementById('vid').value;
				var price=document.getElementById('pprice').value;
				var name=document.getElementById('pname').value;
				
					url="addcart.php?action=add&vid="+vid+"&quant="+quant+"&name="+name+"&price="+price;
					id="added";


					xhr=new XMLHttpRequest();


					xhr.open("GET", url , true);
					xhr.send();

					function lwdata()
					{
						if(xhr.readyState==4)
						{
						data=xhr.responseText;
						document.getElementById(id).innerHTML=data;
						}
					}
					xhr.onreadystatechange=lwdata;
					if(data=="")
					location.reload();
			}
		</script>
		<script type="text/javascript">
			function update()
			{
				alert("hii");
					url="showmecart.php;
					id="shine";


					xhr=new XMLHttpRequest();


					xhr.open("GET", url , true);
					xhr.send();

					function lwdata()
					{
						if(xhr.readyState==4)
						{
						data=xhr.responseText;
						document.getElementById(id).innerHTML=data;
						}
					}
					xhr.onreadystatechange=lwdata;
					if(data=="")
					location.reload();
			}
		</script>
		<style>
			.video-container {
			position: relative;
			padding-bottom: 56.25%;
			padding-top: 30px; height: 0; overflow: hidden;
			}
			 
			.video-container iframe,
			.video-container object,
			.video-container embed {
			position: absolute;
			top: 0;
			left: 0;
			width: 100%;
			height: 100%;
			}
			.video-container2 {
			position: relative;
			padding-bottom: 56.25%;
			padding-top: 30px; height: 0; overflow: hidden;
			}
		/*	.forlike{
				position:absolute;width:100%;height:100%;background:rgba(0,0,0,0.4);z-index:10;display:none;
			} */
		</style>
		<style>
			.glyphicon-spin {
					-webkit-animation: spin 1000ms infinite linear;
					animation: spin 1000ms infinite linear;
				}
				@-webkit-keyframes spin {
					0% {
						-webkit-transform: rotate(0deg);
						transform: rotate(0deg);
					}
					100% {
						-webkit-transform: rotate(359deg);
						transform: rotate(359deg);
					}
				}
				@keyframes spin {
					0% {
						-webkit-transform: rotate(0deg);
						transform: rotate(0deg);
					}
					100% {
						-webkit-transform: rotate(359deg);
						transform: rotate(359deg);
					}
				}
		</style>
</head>
<div class="container">
<?php
echo '<div class="row" style="background: black;padding: 10px;"><img src="../'.$weblogo.'" /></div>';
?>
<div class="row well" ><center></b><h4>Invoice for order #<?php echo $orderid; ?></h4></b></center></div>
<br/>
 <div class="list-group">
	<div class="list-group-item" align="left">
	
	  <div class="table-responsive">
	<table class="table" border=0>
	<tr><td>
		
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
	
		</td>
		<td>
	
		<b>Payment Method</b><br/>
		<?php
			$sql="SELECT * FROM orders WHERE od_id='$orderid'";
			$result=$conn->query($sql);
			while($row=$result->fetch_assoc()){
				
				if($row['od_method']=="cod")
				echo 'Cash on Delivery<br/>';
			}
		
		?>
		
		</td>
		<td>
	
		<b>Order Summary</b><br/>
		<?php
			$sql="SELECT * FROM orders WHERE od_id='$orderid'";
			$result=$conn->query($sql);
			while($row=$result->fetch_assoc()){
				$scup=substr($row['od_coupan'],0,2);
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
		
		</td>
		<td>
		<?php
		echo '
			<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=http://localhost/mycart/printinvoice.php?id='.$orderid.'" title="Link to Google.com" width="100px" height="100px" />';
			
		?>
		</td>
		</tr>
	  </div>
	  </table>
	 
	  </div>
	</div>
	
	<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th width="40%">Item Name</th>
			<th width="10%">Quantity</th>
			<th width="20%">Price</th>
			<th width="15%">Total</th>
		</tr>
		<?php
				$total=0;
				$sql="SELECT * FROM videos,orders_products WHERE vid_id=od_prod_realid and od_ide='$orderid'";
				$result=$conn->query($sql);
				while($values=$result->fetch_assoc()){
					
		?>
			<tr>
				<td><?php echo $values['vid_name']; ?></td>
				<td><?php echo $values['od_prod_quant']; ?></td>
				<td><?php echo $values['od_prod_price']; ?></td>
				<td><?php echo number_format($values['od_prod_price']*$values['od_prod_quant'],2); ?></td>
			</tr>	
		<?php
			$total=$total+($values['od_prod_quant']*$values['od_prod_price']);
				}
		?>
			<tr>
				<td colspan="3" align="right">Sub-Total</td>
				<td align="left">Rs. <?php echo number_format($total,2); ?></td>
			</tr>
			<?php 
		$ship_charge=0;
		if($total<500){
			$ship_charge=50;
			echo '<tr>
				<td colspan="3" align="right">Delivery Charges</td>
				<td align="left">Rs. '.$ship_charge.'</td>
			
			</tr>';
		}
		?>
			<?php
			if($scup!=NULL){
				echo '
				<tr>
				<td colspan="3" align="right">Total</td>
				<td align="left">Rs. '. number_format($total+$ship_charge,2).'</td>
			</tr>
			<tr>
				<td colspan="3" align="right">Coupan Discount</td>
				<td align="left">Rs. '. ($total*(int)$scup/100 ).'</td>
			</tr>
			<tr>
				<td colspan="3" align="right">Grand Total</td>
				<td align="left">Rs. '. number_format($total+$ship_charge-($total*(int)$scup/100 ),2).'</td>
			</tr>';
			}else{
				echo '
			<tr>
				<td colspan="3" align="right">Grand Total</td>
				<td align="left">Rs. '.number_format($total+$ship_charge,2).'</td>
			</tr>';
			}
			
			?>
	</table>

</div>
</div>


