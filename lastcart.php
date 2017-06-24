<div class="table-responsive">
	<table class="table table-bordered">
		<tr>
			<th width="40%">Item Name</th>
			<th width="10%">Quantity</th>
			<th width="20%">Price</th>
			<th width="15%">Total</th>
			
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
			</tr>	
		<?php
			$total=$total+($values['item_quant']*$values['item_price']);
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
			$scup=substr($_SESSION['coupan'],0,2);
				echo '
			<tr>
				<td colspan="3" align="right">Coupan Discount</td>
				<td align="left">Rs. '.($total*(int)$scup/100 ).'</td>
			</tr>
			';
		
		?>
			<tr>
				<td colspan="3" align="right">Total</td>
				<td align="left">Rs. <?php echo number_format($total+$ship_charge-($total*(int)$scup/100 ),2); ?></td>
			</tr>
			<tr>	
			<td colspan="4" align="right"><input type="submit" class="btn btn-success" value="Confirm" name="confirm"/></td>
			<input type="hidden" name="subtotal" value="<?php echo $total; ?>">
			<input type="hidden" name="total" value="<?php echo ($total+$ship_charge); ?>">
			<input type="hidden" name="ship" value="<?php echo $ship_charge; ?>">
			<input type="hidden" name="coupan" value="<?php echo $_SESSION['coupan']; ?>">
			</tr>
			
		<?php
			}
			else{
				echo '<tr>
				<td colspan="5" align="right"><center>Your Shopping Cart is Empty :( </center></td>';
			}
		?>
	</table>

</div>