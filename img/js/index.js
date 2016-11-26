
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
});
