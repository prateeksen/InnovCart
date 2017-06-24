<?php
error_reporting(0);
session_start();
include('conn/conn.php');
$vidd=$_GET['vid'];
$sql="SELECT vid_quant FROM videos WHERE vid_id='$vidd'";
$res=$conn->query($sql);
while($row=$res->fetch_assoc())
$remains=$row['vid_quant'];
$countfirst=0;
							foreach($_SESSION['shop_cart'] as $keys=>$values)
							{
								if($values['item_id']==$_GET['vid']){
									$countfirst=$values['item_quant']+$_GET['quant'];
									unset($_SESSION['shop_cart'][$keys]);
								}
							}
if(!empty($_GET["action"]) && $_GET["quant"]<$remains) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_GET["quant"]) && $_SESSION['shop_cart'] ) {
			$item_array_id=array_column($_SESSION["shop_cart"],"item_id");
			if(!in_array($_GET['vid'],$item_array_id) && $countfirst==0){
				$count=count($_SESSION['shop_cart']);
				$item_array=array(
					   'item_id'=> $_GET['vid'],
					   'item_name' => $_GET['name'],
					   'item_quant' => $_GET['quant'],
					   'item_price' => $_GET['price']
				);
				$_SESSION['shop_cart'][$count]=$item_array;
			}else{
				$item_array=array(
					   'item_id'=> $_GET['vid'],
					   'item_name' => $_GET['name'],
					   'item_quant' => $countfirst,
					   'item_price' => $_GET['price']
				);
				$key=$_GET['vid'];
				$_SESSION['shop_cart'][$key]=$item_array;			
			}
			
		}else{
			$item_array=array(
			   'item_id'=> $_GET['vid'],
			   'item_name' => $_GET['name'],
			   'item_quant' => $_GET['quant'],
			   'item_price' => $_GET['price']
			);
			$_SESSION['shop_cart'][0]=$item_array;
		}
	
}
}
/*if(isset($msg)){
	echo $msg;
}else{
	echo 'Item Successfully Added!';
}*/
echo count($_SESSION['shop_cart']);


?>
