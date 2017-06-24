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
	$subcat_id=$_GET['subcat'];
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
		}
	}else{
		echo '<h1>Please Set Your Website Attributes From Admin Panel</h1>';
	}
	$sql="SELECT * FROM subcat WHERE subcat_id='$subcat_id'";
	$result=$conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row=$result->fetch_assoc()){
			$cname=$row['subcat_name'];
			$crobot_tags=$row['subcat_robots'];
			$ckeyword_tags=$row['subcat_keywords'];
			$cat_desc=$row['subcat_description'];
		}
	}else{
		header('Location:404.php');
	}
?>
<head>
		<title><?php echo $website_name;?> - <?php echo $cname;?></title>
		<link rel="icon" href="<?php if($webfev!=NULL) echo $webfev;?>">
		<meta name="description" content="<?php echo $cat_desc;?>" />
		<meta name="keywords" content="<?php echo $ckeyword_tags;?>" />
		<meta name="robots" content="<?php echo $crobot_tags;?>" />
		<meta name="copyright" content="<?php echo $copyright_tags;?>" />
		<meta name="DC.title" content="<?php echo $cname;?>" />
		<link rel="stylesheet" href="css/style.css">
		<script src="css/bjs.js"></script>
		<script src="css/bjs2.js"></script>
		<script src="js/addon.js"></script>
		<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=58f5b3b7dec37d00122423bc&product=inline-share-buttons"></script>
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
		</style>
</head>
		
