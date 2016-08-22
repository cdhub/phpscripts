<?php
$thelist='';
if ($handle = opendir('.')) {
	while (false !== ($file = readdir($handle))) {
		if ($file != "." && $file != ".." && $file != __file__) {
			$thelist .= '<a href="'.$file.'">'.$file.'</a><br>';
		}
	}
	closedir($handle);
}       
?>
<P>List of files:</p>
<P><?=$thelist?></p>  
