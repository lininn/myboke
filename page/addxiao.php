<?php
	session_start();
if(empty($_SESSION['usern'])){
					echo "<script>alert('您尚未登录！');location.href='index.html'</script>";
				}else{
					require "sql.php";
					$title=$_POST["title"];
				$lei=$_POST["lei"];
				$tu=$_POST["tu"];
				$bod=$_POST["bod"];
date_default_timezone_set("PRC");
$ashijian=date('Y-m-d',time());
	if($_FILES["tude"]["tmp_name"]!=""){
			$file=$_FILES["tude"];
			$lu=dirname(dirname(__FILE__))."/img1/".$file['name'];
		
			move_uploaded_file($file["tmp_name"],$lu);
		}
			
				$sql="insert into xiao(xtitle,lei,xbod,ximg,xshijian) values('".$title."','".$lei."','".$bod."','".$tu."','".$ashijian."')";
				cha($sql);
				echo "<script>alert('新增成功！');location.href='addxiao.html';</script>";
				
		}
		
?>