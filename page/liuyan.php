<?php
error_reporting(0);
if(isset($_POST["usern"]) && isset($_POST["email"]) && isset( $_POST["nei"])){
	$usern=$_POST["usern"];
	$email=$_POST["email"];
	$nei=$_POST["nei"];
	require "sql.php";
	date_default_timezone_set("PRC");
	$shijian=date('Y-m-d H:i:s',time());
	$sql="insert into liuy(uname,lemail,liuyan,lshijian) values('".$usern."','".$email."','".$nei."','".$shijian."')";
	cha($sql);
	
	
	
	$nei2="尊敬的:".$usern."<br>感谢您的留言！我会尽快给您回复的<br>http://lininn.cn";
	
	require_once "email.class.php";

	$smtpserver = "smtp.163.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = "liniaa@163.com";//SMTP服务器的用户邮箱
	$smtpemailto = $email;//发送给谁
	$smtpuser = "liniaa";//SMTP服务器的用户帐号
	$smtppass = "woshiln199542188";//SMTP服务器的用户密码
	$mailtitle ="来自李宁的感谢";//邮件主题
	$mailcontent = $nei2;//邮件内容
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	//************************ 配置信息 ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = false;//是否显示发送的调试信息
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
sleep(1);
	
	//xiamian
	require_once "email.class.php";
$nei1="姓名:".$usern."<br>邮箱：".$email."<br>留言内容：".$nei."";
	$smtpserver = "smtp.163.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = "liniaa@163.com";//SMTP服务器的用户邮箱
	$smtpemailto ="1174640379@qq.com";//发送给谁
	$smtpuser = "liniaa";//SMTP服务器的用户帐号
	$smtppass = "";//SMTP服务器的用户密码
	$mailtitle ="有新的留言";//邮件主题
	$mailcontent =$nei1 ;//邮件内容
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	//************************ 配置信息 ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = false;//是否显示发送的调试信息
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
	
	
	
	
	
	
	
	echo "留言成功！感谢您的关怀，我会更加努力！";
}else{
	echo "您的信息非法！";
}


?>
