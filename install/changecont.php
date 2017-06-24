<?php
/*
    VideoSiteMaker is a open-source Web Application which can be used to make your own custom video tube website.
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
			error_reporting(0);
			$file = '../conn/conn.php';
			$folder='../conn';
			if(!is_writable($file) || !is_writable($folder)){
				chmod($file,0755);
				chmod($folder,0755);
			}
			file_put_contents($file,str_replace('innovcart',$_SESSION['dbname'],file_get_contents($file)));
			file_put_contents($file,str_replace('localhost',$_SESSION['dbhost'],file_get_contents($file)));
			file_put_contents($file,str_replace('root',$_SESSION['dbuser'],file_get_contents($file)));
			file_put_contents($file,str_replace('$pass=""','$pass="'.$_SESSION['dbpass'].'"',file_get_contents($file)));
			
?>