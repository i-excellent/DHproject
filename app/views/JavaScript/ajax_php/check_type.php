<?php

$DBH = new PDO('mysql:host=sql8.freemysqlhosting.net;dbname=sql8111036', 'sql8111036', '1GAk7bbrgd',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'utf8\''));


$result=$DBH->query("SELECT subject_name FROM subject WHERE type_id=".$_GET['type']."");
if($result->rowCount() > 0)
{
    $row1 = $result->fetchAll(PDO::FETCH_ASSOC);}
$count=count($row1);
$out_array=array();
for ($x=0; $x<$count; $x++){
array_push($out_array,$row1[$x]['subject_name'] );}//Многомерный масив -> Одномерый для JSON
echo json_encode($out_array);
?>