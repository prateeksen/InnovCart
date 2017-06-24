<?php
session_start();
include('conn/conn.php');
if(isset($_SESSION['username'])){
	$by=$_SESSION['username'];
	$sql="SELECT * FROM members WHERE user_username='$by'";
	$result=$conn->query($sql);
	while($row=$result->fetch_assoc()){
		$by=$row['user_id'];
	}
	
	$fname=$_GET['firstname'];
	$lname=$_GET['lastname'];
	$email=$_GET['email'];
	$tele=$_GET['telephone'];
	$fax=$_GET['fax'];
	$compony=$_GET['company'];
	$addr_one=$_GET['address_1'];
	$addr_two=$_GET['address_2'];
	$city=$_GET['city'];
	$postcode=$_GET['postcode'];
	$cont_code=$_GET['country_id'];
	$state=$_GET['state'];
	$pmethod=$_GET['payment_method'];
	$subtotal=$_GET['subtotal'];
	$total=$_GET['total'];
	$ship=$_GET['ship'];
	$coupan=$_GET['coupan'];
	
	if(!empty($_SESSION['shop_cart'])){
		
		$sql="INSERT INTO `orders`(`od_coupan`,`od_by`, `od_fname`, `od_lname`, `od_email`, `od_phone`, `od_fax`, `od_compony`, `od_addr_one`, `od_addr_two`, `od_city`, `od_post_code`, `od_country`, `od_state`, `od_method`, `od_subtotal`, `od_ship`, `od_total`,`od_date`)
	VALUES ('$coupan','$by','$fname','$lname','$email','$tele','$fax','$compony','$addr_one','$addr_two','$city','$postcode','$cont_code','$state','$pmethod','$subtotal','$ship','$total',NOW())";
	$result=$conn->query($sql);
	if($result){
		echo '<div class="panel panel-primary">
  <div class="panel-body list-group-item active">Order Status</div>
  <div class="panel-footer">
  <h2>Your order has been placed!</h2>
  Your order has been successfully processed!<br/>
  Thanks for shopping with us online!
  </div>
  </div>';
	}else{
		echo 'Some error occures.please try some time later.';
	}
	
	
	$sqlme="SELECT od_id FROM orders WHERE od_email='$email' ORDER BY od_id DESC LIMIT 1";
	$resultme=$conn->query($sqlme);
	while($rowme=$resultme->fetch_assoc()){
		$getorder=$rowme['od_id'];
	}
	$total=0;
				foreach($_SESSION['shop_cart'] as $keys => $values){
					$pid=$values['item_id'];
					$pname=$values['item_name'];
					$pquant=$values['item_quant'];
					$price=$values['item_price'];
					
					$sql="INSERT INTO `orders_products`(`od_ide`,`od_prod_realid`, `od_prod_name`, `od_prod_quant`, `od_prod_price`) 
					VALUES ('$getorder','$pid','$pname','$pquant','$price')";
					$result=$conn->query($sql);
					if($result){
						$sql3="SELECT * FROM videos WHERE vid_id='$pid'";
						$result3=$conn->query($sql3);
						while($row=$result3->fetch_assoc()){
							$quantold=$row['vid_quant']-1;
						}
						$sql2="UPDATE `videos` SET `vid_quant`='$quantold' WHERE `vid_id`='$pid'";
						$result2=$conn->query($sql2);
						if($result2){
							//echo 'Product successfully loaded in database.';
						}
					}
				}
				unset($_SESSION['shop_cart']);
				unset($_SESSION['coupan']);
	}
	}
else{
	$fname=$_GET['firstname'];
	$lname=$_GET['lastname'];
	$email=$_GET['email'];
	$tele=$_GET['telephone'];
	$fax=$_GET['fax'];
	$compony=$_GET['company'];
	$addr_one=$_GET['address_1'];
	$addr_two=$_GET['address_2'];
	$city=$_GET['city'];
	$postcode=$_GET['postcode'];
	$cont_code=$_GET['country_id'];
	$state=$_GET['state'];
	$pmethod=$_GET['payment_method'];
	$subtotal=$_GET['subtotal'];
	$total=$_GET['total'];
	$ship=$_GET['ship'];
	$coupan=$_GET['coupan'];
	if(!empty($_SESSION['shop_cart'])){
				
	

	$sql="INSERT INTO `orders`(`od_coupan`,`od_fname`, `od_lname`, `od_email`, `od_phone`, `od_fax`, `od_compony`, `od_addr_one`, `od_addr_two`, `od_city`, `od_post_code`, `od_country`, `od_state`, `od_method`, `od_subtotal`, `od_ship`, `od_total`,`od_date`)
	VALUES ('$coupan','$fname','$lname','$email','$tele','$fax','$compony','$addr_one','$addr_two','$city','$postcode','$cont_code','$state','$pmethod','$subtotal','$ship','$total',NOW())";
	$result=$conn->query($sql);
	if($result){
		echo '<div class="panel panel-primary">
  <div class="panel-body list-group-item active">Order Status</div>
  <div class="panel-footer">
  <h2>Your order has been placed!</h2>
  Your order has been successfully processed!<br/>
  Thanks for shopping with us online!
  </div>
  </div>';
	}else{
		echo 'Some error occures.please try some time later.';
	}
	
	$sqlme="SELECT od_id FROM orders WHERE od_email='$email' ORDER BY od_id DESC LIMIT 1";
	$resultme=$conn->query($sqlme);
	while($rowme=$resultme->fetch_assoc()){
		$getorder=$rowme['od_id'];
	}
	$total=0;
				foreach($_SESSION['shop_cart'] as $keys => $values){
					$pid=$values['item_id'];
					$pname=$values['item_name'];
					$pquant=$values['item_quant'];
					$price=$values['item_price'];
					
					$sql="INSERT INTO `orders_products`(`od_ide`,`od_prod_realid`, `od_prod_name`, `od_prod_quant`, `od_prod_price`) 
					VALUES ('$getorder','$pid','$pname','$pquant','$price')";
					$result=$conn->query($sql);
					if($result){
						$sql3="SELECT * FROM videos WHERE vid_id='$pid'";
						$result3=$conn->query($sql3);
						while($row=$result3->fetch_assoc()){
							$quantold=$row['vid_quant']-1;
						}
						$sql2="UPDATE `videos` SET `vid_quant`='$quantold' WHERE `vid_id`='$pid'";
						$result2=$conn->query($sql2);
						if($result2){
							//echo 'Product successfully loaded in database.';
						}
					}
				}
	}
	unset($_SESSION['shop_cart']);
	unset($_SESSION['coupan']);
}

?>