<?php 
		session_start();
		?>
<!doctype html>
<html lang="zh-CN">
	
<head>
	<meta charset="UTF-8" />
	<title>lininn</title>
	<script src="../js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css"/>
</head>
<body>
	<?php
	
if(isset($_GET["id"]) && isset($_GET["shuxing"])){
	$id=$_GET["id"];
	$shuxing= $_GET["shuxing"];
	require "sql.php";
	$sql="select * from $shuxing where id=".$id;
	$result=cha($sql);
	$row=mysql_fetch_array($result);

?>
<div class="container">
	

			<div class="jumbotron ">
				<h1>笑一笑，十年少！</h1>
				<p> 在无聊的日子，让笑容常伴...</p>
				
			</div>
		
	<div class="panel panel-warning">
			<div class="panel-heading">
				<h2 class="text-center"><?php echo $row["xtitle"];?></h2>
				<p class="text-right" style="margin-right: 20px;">时间：<?php echo $row["xshijian"]?>&nbsp; &nbsp; 	</p>
			</div>
			<div class="panel-body" style="text-indent: 5px;">
				<p><?php 
				if($row["ximg"]==""){
				echo $row["xbod"];
				}else{
					echo "<img style='width:400px;display:block;margin:0 auto' src='".$row["ximg"]."'><br>".$row["xbod"];
				}
				?></p>
			</div>
			<div class="panel-footer" >
				<a href="../index.php">http://lininn.cn</a>
				<span style="float: right;"><a href="../index.php">返回</a></span>
			</div>
		</div>
		
		
		
	
	</div>	
		
	
	</div>	
	
	
	
	<?php

	
	
}else{
	echo "<script>alert('非法操作！');location.href='../index.php'</script>";
	
}
?>
</body>
</html>
