<?php
if(isset($_GET['id'])){
$url="http://player.kuwo.cn/webmusic/st/getNewMuiseByRid?rid=MUSIC_".$_GET['id'];
	$nei=file_get_contents($url);
	$a=strpos($nei, '<name>')+6;
 $b=strpos($nei,'</name>');
 $l=$b-$a;
$name=substr($nei, $a,$l);
//以下是路径

	$a=strpos($nei, '<mp3path>')+9;
 $b=strpos($nei,'</mp3path>');
 $l=$b-$a;
$path1=substr($nei, $a,$l);




	$a=strpos($nei, '<mp3dl>')+7;
 $b=strpos($nei,'</mp3dl>');
 $l=$b-$a;
$path=substr($nei, $a,$l);
$path="http://".$path."/resource/".$path1;
echo $path;
}

?>


