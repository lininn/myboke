<?php
error_reporting(0);
$user=$_POST["user"];
$you=$_POST["you"];
$liu=$_POST["liu"];
$tell=$_POST["tell"];
if(isset($user) && isset($you) && isset($liu) && isset($tell)){
	
	$nei="姓名:".$user."<br>电话号码：".$tell."<br>邮箱：".$you."<br>留言内容：".$liu."";
	echo "发送成功！感谢您的反馈，我们会尽快和您取得联系！";
	require_once "email.class.php";

	$smtpserver = "smtp.126.com";//SMTP服务器
	$smtpserverport =25;//SMTP服务器端口
	$smtpusermail = "lvqian666@126.com";//SMTP服务器的用户邮箱
	$smtpemailto = "1010164822@qq.com";//发送给谁
	$smtpuser = "lvqian666";//SMTP服务器的用户帐号
	$smtppass = "liunian19960501";//SMTP服务器的用户密码
	$mailtitle ="大津尼的新留言";//邮件主题
	$mailcontent = $nei;//邮件内容
	$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
	//************************ 配置信息 ****************************
	$smtp = new smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
	$smtp->debug = false;//是否显示发送的调试信息
	$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);

	
	if($state==""){
		echo "对不起，邮件发送失败！请检查邮箱填写是否有误。";
		echo "<a href='index.html'>点此返回</a>";
		exit();
	}

	
	
	
	
	
	
	
	

}else{
	echo "非法操作";
	exit;
}

	

?>