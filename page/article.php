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
				<h1>欢迎来到技术分享</h1>
				<p> 希望你能在这里学到更多... 也能给我更多的建议！</p>
				<button type="button" class="btn btn-info">begin</button>
			</div>
		
	<div class="panel panel-warning">
			<div class="panel-heading">
				<h2 class="text-center"><?php echo $row["title"];?></h2>
				<p class="text-right" style="margin-right: 20px;">时间：<?php echo $row["ashijian"]?>&nbsp; &nbsp; 浏览量:<?php $fang=$row["afang"]; 
				if($_SESSION["ning"]==$id){
						echo $fang;
							
				}else{
				
					echo ($fang+1);
			$sql="update article set afang='".($fang+1)."' where id=".$id;
				cha($sql);
				}
			$_SESSION["ning"]=$id;
				?></p>
			</div>
			<div class="panel-body" style="text-indent: 5px;">
				<p><?php 
				$zhuan=htmlspecialchars($row["bod"]);
				
			
				$zhuan=str_replace("&lt;huan&gt;", "<br>", $zhuan);
					$zhuan=str_replace("&lt;pre&gt;", "<pre>", $zhuan);
						$zhuan=str_replace("&lt;/pre&gt;", "</pre>", $zhuan);
				if($row["aimg"]==""){
				
				echo $zhuan;
				}else{
					
				
					echo "<img style='width:400px;display:block;margin:0 auto' src='".$row["aimg"]."'><br>". $zhuan;
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
