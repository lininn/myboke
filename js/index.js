var jubu=new Object();
$(function(){
	$(".nav_r ul li").eq(1).hover(
		function(){
		
			$(".nav_r ul li .qqlian").show();
		},
		function(){
				$(".nav_r ul li .qqlian").hide();
		}
	);
	
	
	/*留言板*/
	$(".cloose").click(function(){
		
		$("#dialog").css("display","none");
	})
	
	$("#liuyan").click(function(){
			$("#dialog").slideDown();
	})
	
	/*关闭推荐名言*/
	$(".guanbi").click(function(){
		$(".tui_m").slideUp();
	})
})




//适应屏幕

$(function(){
			var hei=window.innerHeight;
			var wid=document.documentElement.clientWidth;
			
			$("#bbgg").css({
				"height":hei,
				"width":"100%",
				
			});
			console.log(hei);
	
		$("#dian").click(function(e){
			e.preventDefault();
			var cheng=$("#cheng").val();
			var email=$("#email").val();
			var nei=$(".wenben").val();
			var reg=/^.{2,}$/;
			var reg2=/^(\w+)@(\w+)\.(\w+)$/;
			var reg3=/^.{5,}$/;
			if(reg.test(cheng)){
				if(reg2.test(email)){
					if(reg3.test(nei)){
						$(".btnbtn input").css("background",'gray');
						//ajax
							$.ajax({
								type:"post",
								url:"page/liuyan.php",
								async:true,
								data:$("#fasong").serialize(),
								success:function(data){
									
									alert(data);
									$(".btnbtn input").css("background",'#337ab7');
								$("#dialog").css("display","none");
								}
							});
						
						
						
					}else{
						alert("内容不得少于五个字！");
						$(".wenben").focus();
					}
				}else{
					alert("邮箱格式不正确！");
					$("#email").focus();
				}
			}else{
				alert("用户名为至少两位！");
				$("#cheng").focus();
			}
			

	return false;
});	
		})

	
	function tiao(dizhi,shu){
		location.href="page/article.php?id="+dizhi+"&shuxing="+shu;
	}

//表单




	$(function(){
	$('#dowebok').pogoSlider({
		targetHeight:300,
		targetWidth:630
	});
	
	//搜索歌曲
	$("#dianji").click(function(){
		
		if(document.getElementById("mulist")){
 			mulist=document.getElementById("mulist");
 			mulist.remove();
 		}
		
 		if(document.getElementById("wenjian")){
 			wenjian=document.getElementById("wenjian");
 		wenjian.remove();
 		}
 		var sou=document.createElement("script");
 		var gename=document.getElementById("shu").value;
 		sou.setAttribute("id","wenjian");
 		sou.setAttribute("src","http://search.kuwo.cn/r.s?SONGNAME="+gename+"&ft=music&rformat=json&encoding=utf8&rn=10&callback=song&vipver=MUSIC_8.0.3.1");
 	document.body.appendChild(sou);
		
		
	})
	
	
	
	
	
	

	
	
	
	
	
	
	
	
	
});
function jsonError(e){
  	
  	}
  	
  	function song(data){
  	jubu=data;
  	//alert(data.abslist.length);
  	$(".search").append("<ul id='mulist'></ul>");
  	var st="";
	for(var i=0;i<2;i++){
		//alert(data.abslist[i].SONGNAME);data.abslist[i].MP3RID
		
		st="<li onclick='"+'bofang("'+data.abslist[i].MP3RID+'")'+"'>";
		st+='歌曲名称:'+data.abslist[i].SONGNAME+'</li>';
	
$("#mulist").append(st);
	

	}
  
  	}
  	

function bofang(zhi){
$("#geming").html("<span></span>"+jubu.abslist[0].SONGNAME);
$("#geshou").html("<span></span>"+jubu.abslist[0].ARTIST);
zhi=zhi.substr(4,zhi.length);
//alert(zhi);
$.ajax({
	type:"get",
	url:"page/kuwo.php?id="+zhi,
	async:true,
	success:function(res){
	if(res.length>0){
	
	
		var bo=document.getElementById("bofangqi");
	bo.src=res;
	bo.play();
	}else{
		alert("有点小毛病！联系一下宁哥吧！");
	}
	}
	});
	
}