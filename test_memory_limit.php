<?php
$m='3M';
echo "set $m<br>";
$m=memory_get_usage();
echo "usage $m<br>";
ini_set('memory_limit', $m);
$m=ini_get('memory_limit');
echo "limit $m<br>";
$image = imagecreatefrompng('2m.png');
echo $m;

//or phpinfo(); php -i|grep memory
