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

    echo '<div class="list-group">
			   <div class="list-group-item"><center><a href="checkout.php" class="btn-lg btn-success btn-block" style="text-decoration:none;border: 1px solid rgba(0,0,0,0.2);">Checkout</a></center></div>
			   </div>';
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