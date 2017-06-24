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
	$comment=strip_tags($conn->real_escape_string($_GET['comment']));
	$commenter=strip_tags($conn->real_escape_string($_GET['commenter']));
	$vid=$_GET['vid'];
	// Must Check After User Table
	$sql="INSERT INTO `comments`(`vid_id`, `comment`, `comment_by`) VALUES ('$vid','$comment','$commenter')";
	$result=$conn->query($sql);
	if($result){
		echo "<div class='alert alert-success' align='center'> Successfully Added</div>";
	}else{
		echo "<div class='alert alert-error' align='center'> Some Error Occures</div>";
	}
?>
<table class="table table-striped">
<?php 
	$num_rec_per_page=5;
	if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; 
	$start_from = ($page-1) * $num_rec_per_page; 
	$sql = "SELECT * FROM comments WHERE vid_id='$vid' ORDER BY comment_id DESC LIMIT $start_from, $num_rec_per_page"; 
	$rs_result = $conn->query($sql); //run the query
	
	while ($row =$rs_result->fetch_assoc()) { 
		echo '<tr><td><a href="viewprofile.php?user='.$row['comment_by'].'"><b>'.$row['comment_by'].'</b></a></td><td align="right">'.$row['comment_on'].'<td></tr>';
		echo '<tr><td colspan="2">'.$row['comment'].'</td></tr>';
	}
?> 
</table>

<center><ul class="pagination">
<?php 
	$sql = "SELECT * FROM comments WHERE vid_id='$vid' ORDER BY comment_id DESC"; 
	$rs_result = $conn->query($sql); //run the query
	$total_records = $rs_result->num_rows;  //count number of records
	$total_pages = ceil($total_records / $num_rec_per_page); 
		
	if($total_records>0)
		echo "<li><a href='showproduct.php?id=".$vid."&page=1'>".'<'."</a></li> "; // Goto 1st page  

	for ($i=1; $i<=$total_pages; $i++) { 
		echo "<li><a href='showproduct.php?id=".$vid."&page=".$i."'>".$i."</a></li> "; 
	}; 
	
	if($total_records>0)
		echo "<li><a href='showproduct.php?id=".$vid."&page=$total_pages'>".'>|'."</a></li> "; // Goto last page
?>
</li></center>