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
include('conn/conn.php');

if($_GET['ad']=="60090"){
	$sql="SELECT ad_clicks FROM ads WHERE ad_type='60090'";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	echo $countme=$row['ad_clicks'];
	$countme=$countme+1;
	$sql="UPDATE `ads` SET `ad_clicks`='$countme' WHERE `ad_type`='60090'";
	$result=$conn->query($sql);
}else if($_GET['ad']=="72890"){
	$sql="SELECT ad_clicks FROM ads WHERE ad_type='72890'";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	echo $countme=$row['ad_clicks'];
	$countme=$countme+1;
	$sql="UPDATE `ads` SET `ad_clicks`='$countme' WHERE `ad_type`='72890'";
	$result=$conn->query($sql);
}else if($_GET['ad']=="250250"){
	$sql="SELECT ad_clicks FROM ads WHERE ad_type='250250'";
	$result=$conn->query($sql);
	$row=$result->fetch_assoc();
	echo $countme=$row['ad_clicks'];
	$countme=$countme+1;
	$sql="UPDATE `ads` SET `ad_clicks`='$countme' WHERE `ad_type`='250250'";
	$result=$conn->query($sql);
}
?>