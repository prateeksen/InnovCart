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
include('conn/conn.php');
	$id=strip_tags($conn->real_escape_string($_GET['id']));
if(isset($_SESSION['username'])){
	$username=$_SESSION['username'];
	$sql="SELECT * FROM member_likes WHERE like_vid='$id' and like_by='$username'";
	$result=$conn->query($sql);
	if($result->num_rows > 0){
		$sql1="DELETE FROM member_likes WHERE like_by='$username' and like_vid='$id'";
		$result1=$conn->query($sql1);
		if($result1){
			$sql2="UPDATE videos SET likes=likes-1 WHERE vid_id='$id'";
			$result2=$conn->query($sql2);
			if($result2){
				$sql3="SELECT likes FROM videos WHERE vid_id='$id'";
				$result3=$conn->query($sql3);
				$row=$result3->fetch_assoc();
				$likesnow=$row['likes'];
				echo $likesnow.' <span class="badge">Product Un-liked</span>';
			}else{
				echo 'Some Error Occures 1';
			}	
		}
	}else{
		$sql="INSERT INTO `member_likes`(`like_by`, `like_vid`, `like_time`) VALUES ('$username','$id',NOW())";
		$result=$conn->query($sql);
		if($result){
			$sql1="UPDATE videos SET likes=likes+1 WHERE vid_id='$id'";
			$result1=$conn->query($sql1);
			if($result1){
				$sql3="SELECT likes FROM videos WHERE vid_id='$id'";
				$result3=$conn->query($sql3);
				$row=$result3->fetch_assoc();
				$likesnow=$row['likes'];
				echo $likesnow.' <span class="badge">Product Liked</span>';
			}else{
				echo 'Some Error Occures 1';
			}
		}
	}
	// if not then increment counter and save in members_like table
	// if yes than unlike mean decrement counter or like value and delete entry from members_like table
}else{
	$sql3="SELECT likes FROM videos WHERE vid_id='$id'";
				$result3=$conn->query($sql3);
				$row=$result3->fetch_assoc();
				$likesnow=$row['likes'];
				echo $likesnow;
				echo " You are Logged Out.";
}
?>