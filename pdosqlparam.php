$sql="update table1 (name)values(:name)";
$bind=['name'=>'tom'];

foreach ($bind as $index => $item) {
	$sql=str_replace(":$index","'$item'",$sql);
}
echo $sql;
