<?php
header("Content-type:text/html;charset=utf-8");
session_start();
require 'sql.php';
	$usern=$_POST["usern"];
	$mima=$_POST["mima"];
	$sql="select * from usern where usern='".$usern."'";
	$result=cha($sql);
	$row=mysql_fetch_array($result);
	if($usern==$row['usern'] && $mima==$row['mima']){
		
		$_SESSION['usern']=$row['usern'];
		echo "<script>location.href='indexa.php'</script>";
	}else{
	echo "<script>alert('用户名或密码错误！');history.back();</script>";
	}
	
	
	?>