<?php
$thelist='';
if ($handle = opendir('.')) {
	while (false !== ($file = readdir($handle))) {
		if ($file == "." || $file == ".." || $file == __file__) {
			continue;
		}
		$thelist .= '<a class=a href="'.$file.'">'.$file.'</a><br>';
	}
	closedir($handle);
}
?>
<!DOCTYPE html><html lang="en-US">
<head><meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<style type="text/css">
a:focus{color:#ccc;background:yellow;}
a:active{color:#ccc;background:red;}
</style>
</head>
<body>
<P>List of files:</p>
<P><?=$thelist?></p>
</body>
</html>
