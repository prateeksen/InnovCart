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
<html>
<?php
	error_reporting(0);
	session_start();
	include('conn/conn.php');
	include('insiderhead.php');
	include('pageviews.php');
?>
	<body>
		<?php include('menu.php'); ?>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3">
					<?php include('leftbar.php');?>
					<?php include('leftads.php'); ?>
					<?php include('leftads.php'); ?>
					<?php include('leftads.php'); ?>
				</div>
				<div class="col-sm-9">
					<?php include('midads.php'); ?>
					<?php include('insidercontent.php'); ?>
					<?php include('midads.php'); ?>
				</div>
			</div>
			<div class="row">
				<?php include('footer.php'); ?>
			</div>
		<div class="container-fluid">
			<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.8&appId=268225800286026";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
	</body>
</html>