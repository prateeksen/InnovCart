<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th width="40%">Item Name</th>
			<th width="10%">Quantity</th>
			<th width="20%">Price</th>
			<th width="15%">Total</th>
			<th width="5%">Action</th>
		</tr>
		<?php
			if(!empty($_SESSION['shop_cart'])){
				$total=0;
				foreach($_SESSION['shop_cart'] as $keys => $values){
		?>
			<tr>
				<td><?php echo '<a href="http://localhost/mycart/showproduct.php?id='.$values['item_id'].'">'.$values['item_name'].'</a>'; ?></td>
				<td><?php echo $values['item_quant']; ?></td>
				<td><?php echo $values['item_price']; ?></td>
				<td><?php echo number_format($values['item_price']*$values['item_quant'],2); ?></td>
				<td><a href="showcart.php?action=delete&id=<?php echo $values['item_id']; ?>">Remove</a></td>
			</tr>	
		<?php
			$total=$total+($values['item_quant']*$values['item_price']);
				}
		?>
		<?php
		
			if(!isset($_SESSION['coupan'])){
			echo '
			<tr>
				<td colspan="3" align="right">Total</td>
				<td align="right">Rs. '. number_format($total,2).'</td>
				<td></td>
			</tr>';
			}else{
				$scup=substr($_SESSION['coupan'],0,2);
				echo '
			<tr>
				<td colspan="3" align="right">Sub-Total</td>
				<td align="right">Rs. '.number_format($total,2).'</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3" align="right">Coupan Discount</td>
				<td align="right">Rs. '.($total*(int)$scup/100 ).'</td>
				<td><a href="showcart.php?action=cupdelete">Remove</a></td>
			</tr>
			';
			}
		?>
		<?php
			}
			else{
				echo '<tr>
				<td colspan="5" align="right"><center>Your Shopping Cart is Empty :( </center></td>';
			}
		?>
	</table>

</div>

<div class="list-group">
	<div class="list-group-item" align="left">
	  <div class="row">
		<div class="col-sm-4">
			Use Coupan Code 
		</div>
		<div class="col-sm-4">
			<input type="text" name="ccode" class="form-control" id="ccode"/> 
		</div>
		<div class="col-sm-4">
			<a class="btn btn-success" onclick="addcup();">Add</a>
			<div id="addedcup"></div>
		</div>
	  </div>
	</div>
</div>