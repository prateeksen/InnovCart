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
	ob_start();
	$sql="SELECT * FROM website_attrib";
	$result=$conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row=$result->fetch_assoc()){
			$website_name=$row['web_name'];
			$website_title=$row['web_title'];
			$description_tags=$row['web_des'];
			$robot_tags=$row['web_robots'];
			$keyword_tags=$row['web_keywords'];
			$copyright_tags=$row['web_copy'];
			$weblogo=$row['web_logo'];
			$webfev=$row['web_fev'];
			$pageviews=$row['pageviews'];
		}
	}else{
		echo '<h1>Please Set Your Website Attributes From Admin Panel</h1>';
	}
?>
<head>
		<title><?php echo $website_name;?> - <?php echo $website_title;?></title>
		<link rel="icon" href="<?php if($webfev!=NULL) echo $webfev;?>">
		<meta name="description" content="<?php echo $description_tags;?>" />
		<meta name="keywords" content="<?php echo $keyword_tags;?>" />
		<meta name="robots" content="<?php echo $robot_tags;?>" />
		<meta name="copyright" content="<?php echo $copyright_tags;?>" />
		<meta name="DC.title" content="<?php echo $website_title;?>" />
		<link rel="stylesheet" href="css/style.css">   
		<!-- <link rel="stylesheet" href="themes/19.css"> --> 
		<script src="css/bjs.js"></script>
		<script src="css/bjs2.js"></script>
		<script src="js/addon.js"></script>
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