<html>
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
<?php error_reporting(0); ?>
	<?php session_start(); if(!isset($_SESSION['username'])) header('Location:404.php'); ?>
	<?php include('conn/conn.php'); ?>
	<?php include('head.php'); ?>
	<?php include('pageviews.php'); ?>
	<body>
		<?php include('menu.php'); ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3">
					<?php include('userleftbar.php'); ?>
					<?php include('leftads.php');?>
				</div>
				<div class="col-sm-9">
					<?php include('ordersuser.php'); ?>
					<?php include('midads.php'); ?>
				</div>
			</div>
			<div class="row">
				<?php include('footer.php'); ?>
			</div>
		</div>
	</body>
</html>