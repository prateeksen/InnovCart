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
    echo '<div class="list-group"><div class="list-group-item"><table style="width:100%"><tbody><tr><th></th><td width="50%">Price</a></td><td width="50%"><b><span class="badge">Rs. '.$vidprice.'</span></b></td></tr></tbody></table></div>
			   <div class="list-group-item"><table style="width:100%"><tbody><tr><th></th><td width="50%">Quantity Remains </a></td><td width="50%"><b><span class="badge">'.$vidquant.'</span></b></td></tr></tbody></table></div>
			   <input type="hidden" value="'.$vidid.'" id="vid">
			   <input type="hidden" value="'.$vidprice.'" id="pprice">
			   <input type="hidden" value="'.$vid_name.'" id="pname">';
			   $sql="SELECT vid_quant FROM videos WHERE vid_id='$vid'";
				$res=$conn->query($sql);
				while($row=$res->fetch_assoc())
				$remains=$row['vid_quant'];
			   if($remains>0){
				   echo '<div class="list-group-item"><table style="width:100%"><tbody><tr><th></th><td width="50%">Quantity </a></td><td width="50%"><b><input type="number" name="quantity" value="1" size="2" class="form-control" id="quant"/></b></td></tr></tbody></table></div>
			   
				   <div class="list-group-item"><button onclick="addtocart();" class="btn-lg btn-default btn-block" style="text-decoration:none;">Add to Cart</button></div>';
			   }else{
				   echo '
				   <div class="list-group-item"><center><div class="btn-lg btn-default btn-block disabled" style="text-decoration:none;color:red;" title="Out of Stock">Out of Stock</div></center></div>
			   ';
			   }
			   
			   echo '</div>';
	if($wfacebook!=NULL){
		echo '<div class="panel panel-primary">
			  <div class="panel-body list-group-item active">Like Facebook</div>
			  <div class="panel-footer">';
		echo '<div class="fb-like" data-href="https://www.facebook.com/'.$wfacebook.'" data-layout="standard" data-width="250" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>';
		echo '</div></div>';
	}
?>
<?php 
	include('leftads.php');
?>