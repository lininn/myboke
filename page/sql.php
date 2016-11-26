<?php
function cha($sql){
@mysql_connect('localhost','sq_lining','979611181')or die('错误：'.mysql_error());
    @mysql_select_db('sq_lining') or die('错误：'.mysql_error());
mysql_query("SET NAMES utf8");

$result=mysql_query($sql);
return $result;
}
//$result=cha("select * from article");
//if($row=mysql_fetch_array($result)){
//	print_r($row);
//}
?>