<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    
<%@page import="java.util.*"%>
<%@page import="com.oreilly.servlet.MultipartRequest" %>
<%@page import="com.oreilly.servlet.multipart.DefaultFileRenamePolicy" %>
<%@page import="java.io.*" %>
<%@page import="java.util.Date" %>

<jsp:useBean id="Login_Access" class="DAO.Login_Access" />
<jsp:useBean id="LoginBean" class="DTO.LoginBean" />
<jsp:setProperty name="LoginBean" property="*" />
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
	request.setCharacterEncoding("UTF-8");

	int maxsize=1024 * 1024 * 10;
	
	String savePath="C:\\Users\\itwill\\workspace\\PortPolio\\WebContent\\upload\\";
	
	String uploadFile="";
	
	String newFileName="";
	
	int read=0;
	byte[] buf=new byte[1024];
	FileInputStream fin=null;
	FileOutputStream fout=null;
	
	try{
		//기존 이미지 삭제
		String oldFileName=Login_Access.photo_mod((String)session.getAttribute("id"));
		File oldFile=new File(savePath+oldFileName);
		if(oldFile.isFile())	{oldFile.delete();}
		
		//파일 업로드
		MultipartRequest multi=new MultipartRequest(request, savePath, maxsize,"UTF-8",new DefaultFileRenamePolicy());
		uploadFile=multi.getFilesystemName("login_photo_identification");
		
		//실제 저장할 파일
		newFileName=(String)session.getAttribute("id")+"_"+uploadFile;
		
		
		String login_id=multi.getParameter("login_id");
		String login_pw=multi.getParameter("login_pw");
		String login_name=multi.getParameter("login_name");
		
		LoginBean.setLogin_id(login_id);
		LoginBean.setLogin_pw(login_pw);
		LoginBean.setLogin_name(login_name);
		LoginBean.setLogin_photo_identification(newFileName);
		
		//객체 생성
		File oldimg=new File(savePath+uploadFile);
		File newimg=new File(savePath+newFileName);
		
		if(!oldimg.renameTo(newimg)){
			buf=new byte[1024];
			fin=new FileInputStream(oldimg);
			fout=new FileOutputStream(newimg);
			read=0;
			
			while((read=fin.read(buf,0,buf.length))!=-1){
				fout.write(buf,0,read);
			}
			fin.close();
			fout.close();
			oldimg.delete();
		}
		
	}	catch(Exception e){
			e.printStackTrace();
	}	finally{
			
	}
	Login_Access.login_modify(LoginBean);
%>
</body>
</html>