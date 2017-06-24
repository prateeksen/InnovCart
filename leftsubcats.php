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
	$sql="SELECT * FROM subcat WHERE cat_name='$cat_name'";
	$result=$conn->query($sql);
	echo ' <ul class="list-group">
	<li class="list-group-item active">Sub Categories</li>
	';
	if($result->num_rows > 0){
		while($row=$result->fetch_assoc()){
			echo '<a href="viewinside.php?subcat='.$row['subcat_id'].'" class="list-group-item">'.$row['subcat_name'].'</a>';
		}
	}else{
		echo '<li class="list-group-item">No Categories</li>';
	}
	
		echo '</ul>';
	
?> 
