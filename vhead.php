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
	session_start();
	$vid=$_GET['id'];
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
	$sql="SELECT * FROM videos WHERE vid_id='$vid'";
	$result=$conn->query($sql);
	if($result->num_rows > 0)
	{
		while($row=$result->fetch_assoc()){
			$vidid=$row['vid_id'];
			$vid_name=$row['vid_name'];
			$vrobot_tags=$row['vid_robots'];
			$vkeyword_tags=$row['vid_keywords'];
			$vview=$row['views'];
			$vlike=$row['likes'];
			$cathname=$row['cat_name'];
			$vidby=$row['vid_by'];
			$vidquant=$row['vid_quant'];
			$vidprice=$row['vid_price'];
		}
	}else{
		header('Location:404.php');
	}
?>
<head>
		<title><?php echo $website_name;?> - <?php echo $vid_name;?></title>
		<link rel="icon" href="<?php if($webfev!=NULL) echo $webfev;?>">
		<meta name="description" content="<?php echo $vid_name;?>" />
		<meta name="keywords" content="<?php echo $vkeyword_tags;?>" />
		<meta name="robots" content="<?php echo $vrobot_tags;?>" />
		<meta name="copyright" content="<?php echo $copyright_tags;?>" />
		<meta name="DC.title" content="<?php echo $vid_name;?>" />
		<link rel="stylesheet" href="css/style.css">
		<script src="css/bjs.js"></script>
		<script src="css/bjs2.js"></script>
		<script src="js/addon.js"></script>
		<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=58f5b3b7dec37d00122423bc&product=inline-share-buttons"></script>
		<script type="text/javascript">
			function addtocart()
			{
				var quant=document.getElementById('quant').value;
				var vid=document.getElementById('vid').value;
				var price=document.getElementById('pprice').value;
				var name=document.getElementById('pname').value;
				
					url="addcart.php?action=add&vid="+vid+"&quant="+quant+"&name="+name+"&price="+price;
					id="added";


					xhr=new XMLHttpRequest();


					xhr.open("GET", url , true);
					xhr.send();

					function lwdata()
					{
						if(xhr.readyState==4)
						{
						data=xhr.responseText;
						document.getElementById(id).innerHTML=data;
						}
					}
					xhr.onreadystatechange=lwdata;
					if(data=="")
					location.reload();
			}
		</script>
		<script type="text/javascript">
			function update()
			{
				alert("hii");
					url="showmecart.php;
					id="shine";


					xhr=new XMLHttpRequest();


					xhr.open("GET", url , true);
					xhr.send();

					function lwdata()
					{
						if(xhr.readyState==4)
						{
						data=xhr.responseText;
						document.getElementById(id).innerHTML=data;
						}
					}
					xhr.onreadystatechange=lwdata;
					if(data=="")
					location.reload();
			}
		</script>
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
			.video-container2 {
			position: relative;
			padding-bottom: 56.25%;
			padding-top: 30px; height: 0; overflow: hidden;
			}
		/*	.forlike{
				position:absolute;width:100%;height:100%;background:rgba(0,0,0,0.4);z-index:10;display:none;
			} */
		</style>
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
<!--	<div class="forlike" id="forlikes"></div> -->
		
