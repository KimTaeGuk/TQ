<%@page import="java.io.File"%>
<%@page import="DTO.MsgInformBean"%>
<%@page import="DAO.Comment_Access"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.util.ArrayList" %>
<jsp:useBean id="Comment_Access" class="DAO.Comment_Access" />
<jsp:useBean id="Login_Access" class="DAO.Login_Access" />
<jsp:useBean id="MsgInformBean" class="DTO.MsgInformBean" />
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

<script>
function mailImg_change(){
	//세션 생성하여 봤다고 하기
	$("#img_info").attr("src","./img/mail_open.png");
}
//////////////////////////////로그인////////////////////////////////////
	$(document).ready(function(){
	});
	
	function showLogin(){
		var maskHeight="100%";
		var maskWidth="100%";
		$('#mask').css({'width':maskWidth,'height':maskHeight});
		
		if($('#container').css('display')=='none'){
			$("#container").fadeIn();
			$('#mask').fadeTo("1000",0.6);
		}		
	}
	function closeLogin(){
		$("#container").fadeOut();	
		$('#mask').fadeOut();
	}
////////////////////////////////////////////////////////////////////////

	window.onload=function() {
		if(getCookie("id")){
			document.loginForm.id.value = getCookie("id");
			document.loginForm.Save_id.checked=true;
		} 
	}
		
		function setCookie(name,value,expiredays){
			var today=new Date();
			today.setDate(today.getDate()+expiredays);
			document.cookie=name+"="+escape(value)+"; path=/; expires="+today.toGMTString()+";";
		}
		function getCookie(Name){
			var search=Name+"=";
			if(document.cookie.length>0){
				offset=document.cookie.indexOf(search);
				if(offset!=-1){
					offset +=search.length;
					end=document.cookie.indexOf(";",offset);
					if(end==-1){
						end=document.cookie.length;
					}
			return unescape(document.cookie.substring(offset,end));
				}
			}
		}
		function login_cookie() {
			var frm=document.loginForm;
			if(frm.Save_id.checked==true){
				setCookie("id", frm.id.value, 7);
			}	else {
				setCookie("id", frm.id.value, 0);
			}
		}
		
		function PopUp(e){
			var popOption="width=370, height=360, resizable=no, scrollbars=no, status=no;";
			window.open(e,"",popOption);
		}	
</script>
</head>
<body>
<%
	session.setMaxInactiveInterval(60*60*2);		//세션 지속 시간 2 시간
	out.print(session.getAttribute("id"));
	out.print(session.getAttribute("pw"));
%>
<input type="button" value="게시판 리스트" onclick="window.location='./Board/Board_list.jsp'" />
<input type="button" value="회원탈퇴" onclick="window.location='./Login/Login_delete.jsp'" />
<input type="button" value="회원수정" onclick="window.location='./Login/Login_modify.jsp'" />


<!-- ----------------------------------------------------------------------------------------------------------------- -->
<!-- --------------------------------------------------- 로그인 ------------------------------------------------------- -->
<!-- ----------------------------------------------------------------------------------------------------------------- -->
<%
	if(session.getAttribute("is_login")==null){
%>
<input type="button" class="btn btn-info" value="로그인" onclick="showLogin();" />

<div id="mask" style="position:absolute; z-index:100; background-color:#000; display:none; left:0; top:0;"></div>
  <div id="container" class="container" style="z-index: 9000; background-color:white; position:absolute; display:none; width:350px; height:450px; border:2px solid skyblue; top:50%; left:50%; margin-top:-225px; margin-left:-175px">
        <div style="text-align: right;">
        	<span onclick="closeLogin();" style="font-size:20pt; color: gray; cursor:pointer;">X</span>
        </div>
        <div class="card card-container" style="text-align:center;">
            <img id="profile-img"  style="border-radius:50%; width:100px; height:100px;" class="profile-img-card" src="./img/null_photo.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" action="./Login/Login_view_proc.jsp" method="POST" name="loginForm">
                <div id="remember" class="checkbox" style="text-align: right">
                    <label>
                        <input type="checkbox" value="remember-me" name="Save_id" id="Save_id"> Remember me 
                    </label>
                </div>
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" id="id" name="login_id" class="form-control" placeholder="ID" required autofocus>
                <input type="password" id="pw" name="login_pw" class="form-control" placeholder="Password" required>
                <div style="text-align: right;" class="checkbox">
                    <label>
                         <input type="checkbox" name="seller" value="seller"/> Login Seller
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" onclick="login_cookie();">Sign in</button>
            </form><!-- /form -->
        	<button type="button" class="btn btn-info" style="width:100%;" onclick="window.location.href='./Register/Register_sel.jsp'">Sing Up</button>
			<button type="button" class="btn btn-warning" style="width:49%;" onclick="PopUp('./Login/Login_search_id.jsp');" id="sch_id">Search_ID</button>
			<button type="button" class="btn btn-danger" style="width:49%;" onclick="PopUp('./Login/Login_search_pw.jsp');" id="sch_pw">Search_PW</button>
        </div><!-- /card-container -->
    </div><!-- /container -->
<%
	}	else {
		ArrayList<Integer> num=Comment_Access.Id_BoardNum((String)session.getAttribute("id"));
		ArrayList<MsgInformBean> msginfo=Comment_Access.msg_inform(num);
		
		String imgName=Login_Access.photo_mod((String)session.getAttribute("id"));
		File imgpath=new File("C:\\Users\\itwill\\workspace\\PortPolio\\WebContent\\upload\\"+imgName);
		
		if(imgpath.isFile()){
%>
			<img src="./upload/<%=imgName%>" alt="photo identification" style="width:100px; height:100px; border-radius:50%;"/>

<%
		}	else {
%>
			<img src="./img/null_photo.png" alt="photo identification" style="width:100px; height:100px; border-radius:50%;"/>
<%
		}
%>
		<input type="button" class="btn btn-info" value="로그아웃" onclick="window.location='./Login/Logout_proc.jsp'" />
		<!-- 댓글 달림 알림창 -->
		<div class="btn-group" role="group">
		    <a href="#" onclick="mailImg_change();" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		      <img src="./img/mail_close.GIF" id="img_info" alt="info" style="width:50px; height:35px;"/>
		    </a>
		    <ul class="dropdown-menu" role="menu">
<%
		if(msginfo.size()>0){
			for(int i=0; i < msginfo.size(); i++){
				MsgInformBean msgbean=msginfo.get(i);
				
				int board_num=msgbean.getBoard_num();			
				String comment_id=msgbean.getComment_id();
				String comment_date=msgbean.getComment_date();
				String comment_conent=msgbean.getComment_content();
	
%>			<li><a href="./Board/Board_view.jsp?num=<%=board_num%>">
				<span style="text-size:8px; color:gray;"><%=comment_date%></span>
				<span style="text-size:10px; color:skyblue;"><%=comment_id%></span><br>
				<%=comment_conent%>
				<hr/>
			</a></li>
<%			
			}
		}	else {
				out.println("<li>등록된 댓글이 없습니다.</li>");
		}
%>
		    </ul>
		</div>
		
<%		
	}
%>

</body>
</html>