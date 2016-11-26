<?php
error_reporting(0);
	session_start();
	
	
	if(empty($_SESSION["ning"])){
	$_SESSION['ning']=0;
	}
	
	?>
<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="utf-8" />
		
		<title>覆手为雨</title>
		<meta name="Keywords" content="个人唯美博客，个人博客"/>
		<meta name="Description" content="个人博客，空间，个人空间，宁，暖思，李宁，lininn,ningli"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1.0">
		<meta name="renderer" content="webkit">
		<link rel="stylesheet" type="text/css" href="css/pogo-slider.min.css"/>
	<link rel="ICON"  href="img/11.ico">
		<script src="js/jquery-1.8.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.pogo-slider.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/index.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/BeatPicker.min.css"/>
	<link rel="stylesheet" type="text/css" href="css/prism.css"/>
<script src="js/jquery.page.js" type="text/javascript" charset="utf-8"></script>
	
	<script src="js/BeatPicker.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/prism.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
	
		
	</head>
	
	<body>
		
		
		
<div id="bbgg"></div>		
<div id="dialog">
	<div class="biaodan">
		<label class="cloose">×</label>
		<form action="#" method="post" id="fasong">
		<ul>
			<li><input type="text" placeholder="您的称呼：" required="required"  name="usern" id="cheng" value="" /></li>
		<li><input type="text" placeholder="邮箱：" id="email" required="required"  name="email" value="" /></li>
		<li><textarea  class="wenben" name="nei" placeholder="留言内容：" required="required"></textarea></li>
		
		</ul>
	<div class="btnbtn">
		<input type="submit" name="" id="dian" value="提 交 留 言" />
	</div>
	</form>
	</div>
</div>
		<div id="header">
			<div class="nav">
				<ul>
					<li></li>
				
				
					
				</ul>
				
				<div class="tui_m">
					推荐名言：生容易，活容易，生活不容易，自己的路还得自己走...<span class="guanbi">×</span>
				</div>
				<div class="nav_r">
					<ul>
						<li><img src="img/i1_2.png"/></li>
						<li><img src="img/i2_2.png" id="qqlian"/>
							<div class="qqlian">
									<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=979611181&site=qq&menu=yes">
								<img src="img/qq.jpg" alt="点我" title="点我有惊喜！！"/>
								</a>
							</div>
							</li>
						<li><span id="liuyan">留 言</span></li>
					</ul>
				</div>
			</div>
		</div>
		<div id="article">
			<div class="container">
				<div class="a_header">
					<div class="h_l">
	<div class="dowebok">
	<div class="pogoSlider" id="dowebok">
		<div class="pogoSlider-slide" data-transition="slide" style="background:url(img/1.jpg);z-index: 999;"></div>
		<div class="pogoSlider-slide" data-transition="verticalSlide" style="background:url(img/2.jpg);z-index: 999;"></div>
		<div class="pogoSlider-slide" data-transition="expandReveal" style="background:url(img/3.jpg);z-index: 999;"></div>
		<div class="pogoSlider-slide" data-transition="zipReveal" style="background-image:url(img/2.jpg);"></div>
	<div class="pogoSlider-slide" data-transition="barReveal" style="background-image:url(img/3.jpg);"></div>
		

	</div>
</div>

						
					</div>
					<div class="h_r">
								<div class="sample">
		                    <input class="hide" type="text" data-beatpicker-extra="extra" data-beatpicker="true"
		                          data-beatpicker-position="['center','middle']"/>
		                    <script>
		                        extra = {
		                            view: {
		                                alwaysVisible: true
		                            }
		                        }
		                    </script>
		                </div>
					</div>
				</div>
				<div style="clear: both;height: 45px;width: 100%;"></div>
				<div class="nei">
					<div class="nei_l">
						
		<?php 
			require "page/sql.php";
			$tiao=cha("SELECT count(id) FROM `article`");
			$tiao=mysql_fetch_array($tiao);
			$tiao=$tiao[0];
	
			if(isset($_GET["page"])){
				if($_GET["page"]<0){
					$_GET["page"]=1;
				}
				$currentpage=$_GET["page"];
				if($currentpage>ceil($tiao/5)){
					$currentpage=ceil($tiao/5);
				}
				$current=($currentpage-1) * 5;
				
				$result=cha("SELECT * FROM `article` order by ashijian desc limit $current,5");
			}else{
				$result=cha("SELECT * FROM `article` order by ashijian desc limit 0,5");
					$currentpage=1;
				
			}
		
		
			while($row=mysql_fetch_array($result)){
						

							?>
						
						<div class="nei_fen" onclick="tiao(<?php echo $row["id"]; ?>,'article')">
							<h2><?php echo $row["title"];?></h2>
							<img src="<?php 
							
						$imgsrc= $row["aimg"];
						if(substr($imgsrc,0,4)=="http"){
							echo $row["aimg"];
						}else{
							echo substr($imgsrc, 3);
						}
						
						?>"/><p><?php echo htmlspecialchars($row["des"]);?></p>
							<div style="clear: both;height: 10px;">
								
							</div>
							<div class="d"><span><?php echo $row["ashijian"];?></span><ul>
								<!--<li class="bg_1">33</li>-->
								<li class="bg_2"><?php echo $row["afang"];?></li>
							</ul></div>
							<div class="tx"></div>
							<span class="qiu"></span>
						</div>
						
						
						<?php
							}
							
							?>
						
						
						<div style="clear: both;margin-top: 50px;">
						<div class="tcdPageCode">  </div>
  
						</div>
						
					
						
						
						
						
					
						
						
						
						
						
						
						
					
						
						
					</div>
					
					
					
					<div class="nei_r">
						<div class="tui">
						<h2>技术分享</h2>
						<?php 
						
							$result1=cha("SELECT * FROM `article` order by afang desc limit 0,9");
							$ji=1;
							while($row=mysql_fetch_array($result1)){
								if($ji==1){
								?>
						
					
					<dd class="t_top"><span id="ff">0<?php echo $ji;?></span><a href="page/article.php?id=<?php echo $row['id'];?>&shuxing=article"><?php echo $row["title"];?></a></dd>
					<?php }else{?>
						<dd class="t_top"><span >0<?php echo $ji;?></span><a href="page/article.php?id=<?php echo $row['id'];?>&shuxing=article"><?php echo $row["title"];?></a></dd>
					<?php 
							}
							$ji++;
							}
						?>
					
					
						
						</div>
					
					
					
					
					
					
		
						<div class="tui remen">
						<h2>轻松一刻</h2>
						<?php
							$xiao=cha("select * from xiao order by id desc limit 0,9");
							while($row=mysql_fetch_array($xiao)){
								
							
							
							?>
						
					<dd><span>☾<a href="page/xiao.php?id=<?php echo $row['id'];?>&shuxing=xiao"><?php echo $row["lei"];?></a>☽ </span><a href="page/xiao.php?id=<?php echo $row['id'];?>&shuxing=xiao"><?php echo $row["xtitle"];?></a></dd>
					<?php
							}
						?>
				
					
					
						
						</div>
					
					<div class="search">
						<div>
							<input type="text" name="" placeholder="Search" id="shu" value="" /><span id="dianji">
								
							</span>
						</div>
						<!--<ul id="mulist">
							<li>歌曲</li>
							<li>歌曲</li>
							</ul>-->
					</div>
					
					
					
					<div class="music">
						<div class="m_t">
						<div class="mm_l">
							<img src="img/artwork.png"/>
						</div>
						<div class="mm_r">
							<ul>
								<li id="geming"><span></span>追梦赤子心</li>
								<li id="geshou"><span></span>歌手：徐歌阳</li>
								
								<li><span></span><a href="#">喜欢</a></li>
							</ul>
							</div>
						<div style="clear: both;height: 15px;"></div>
						<audio id="bofangqi" src="http://ningli.win/img/my.mp3" controls="controls" style="margin-left: 5px;"></audio>
						</div>
						
					</div>
					
					
					
					
						
					</div>
					
					
					
					
					
					
				</div>
				
				
				
				
			</div>
			<div style="clear: both;height: 35px;"></div>
			<div id="di">
				<div class="friend">
					<div class="f_l">
						<h2>友情链接</h2>
						<p><a href="http://nuansiling.com">暖思音乐</a></p>
						<p><a href="http://www.baidu.com">项目中心</a></p>
					</div>
					<div class="f_m">
						<h2>最新留言</h2>
						<?php
							$sql3="select * from liuy order by id desc limit 0,3";
							$result=cha($sql3);
							$ji2=0;
							while($row=mysql_fetch_array($result)){
							$ji2++;
							?>
						<dd><img src="img/l<?php echo $ji2;?>.jpg"/>
						<ul>
							<li><span class="time"><?php echo $row['uname'];?></span>在</li>
							<li> <span class="aarti"><?php echo $row["lshijian"];?></span> 留言</li>
							<li><span class="ping"><?php echo $row["liuyan"];?></span></li>
						</ul>
						</dd>
						
						<?php
							}
						
							?>

						

						
					</div>
					<div class="f_r">
						<h2>摄影作品</h2>
						<ul>
							<li><img src="img/01.jpg"/></li>
							<li><img src="img/02.jpg"/></li>
							<li><img src="img/03.jpg"/></li>
							<li><img src="img/04.jpg"/></li>
							<li><img src="img/05.jpg"/></li>
							<li><img src="img/06.jpg"/></li>
							<li><img src="img/07.jpg"/></li>
							<li><img src="img/08.jpg"/></li>
							<li><img src="img/09.jpg"/></li>
						</ul>
					</div>
				</div>
			</div>
			
		</div>
		<div id="footer">
			<div>(c) Copyright 2016 <a href="http://lininn.cn/ku">ning.</a> All Rights Reserved. </div>
		</div>
		
		<script>
		var yeshu=<?php echo ceil($tiao/5);?>;
			var xianye=<?php echo $currentpage;?>;
	
		//分页
		 $(".tcdPageCode").createPage({
        pageCount:yeshu,
        current:xianye,
        backFn:function(p){
         var shi=new Date().getTime();
       
         location.href="index.php?page="+p+"&shi="+shi;
        }
    });
    </script>
	</body>
</html>
