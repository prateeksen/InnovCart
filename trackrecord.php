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
$id=strip_tags($conn->real_escape_string($_GET['id']));
$user=$_SESSION['username'];
$sql="SELECT * FROM member_watch WHERE watch_vid='$id' and watch_by='$user'";
$result=$conn->query($sql);
if($result->num_rows > 0){
	$sql2="UPDATE member_watch SET watch_count=watch_count+1,watch_time=NOW() WHERE watch_vid='$id' and watch_by='$user'";
	$result2=$conn->query($sql2);
}else{
	$sql2="INSERT INTO `member_watch`(`watch_by`, `watch_vid`, `watch_time`) VALUES ('$user','$id',NOW())";
	$result2=$conn->query($sql2);
}
?>