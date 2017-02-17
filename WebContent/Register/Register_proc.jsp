<%@page import="org.apache.catalina.ha.backend.Sender"%>
<%@page import="DAO.Register_Access" %>
<%@page import="java.sql.*" %>
<%@page import="java.util.*"%>
<%@page import="com.oreilly.servlet.MultipartRequest" %>
<%@page import="com.oreilly.servlet.multipart.DefaultFileRenamePolicy" %>
<%@page import="java.io.*" %>
<%@page import="java.util.Date" %>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>

<jsp:useBean id="Register_Access" class="DAO.Register_Access" />
<jsp:useBean id="RegisterBean" class="DTO.RegisterBean" />
<jsp:setProperty name="RegisterBean" property="*" />
<%
	request.setCharacterEncoding("UTF-8");

	//10Mbyte 제한
	int maxsize = 1024 * 1024 * 10;
	
	//경로
	String savePath="D:\\WorkSpace_Tae\\PortPolio\\WebContent\\upload\\";
	
	// 업로드 파일 명
	String uploadFile="";
	
	// 실제 저장할 파일명
	String newFileName="";
	
	int read=0;
	byte[] buf=new byte[1024];
	FileInputStream fin=null;
	FileOutputStream fout=null;
	
	
	try{
		
		
		MultipartRequest multi=new MultipartRequest(request, savePath, maxsize,"UTF-8",new DefaultFileRenamePolicy());
	
		String register_id=multi.getParameter("register_id");
		String register_pw=multi.getParameter("register_pw");
		String register_year=multi.getParameter("register_year");
		String register_month=multi.getParameter("register_month");
		String register_day=multi.getParameter("register_day");
		String register_name=multi.getParameter("register_name");
		
		//파일 업로드
		uploadFile=multi.getFilesystemName("photo_identification");
		
		//실제 저장할 파일명
		newFileName=multi.getParameter("register_id")+"_"+uploadFile;
		
		RegisterBean.setRegister_id(register_id);
		RegisterBean.setRegister_pw(register_pw);
		RegisterBean.setRegister_name(register_name);
		RegisterBean.setRegister_year(register_year);
		RegisterBean.setRegister_month(register_month);
		RegisterBean.setRegister_day(register_day);
		RegisterBean.setPhoto_identification(newFileName);
		
		//업로드 된 파일 객체 생성
		File oldFile=new File(savePath+uploadFile);
		
		//실제 저장될 파일 객체 생성
		File newFile=new File(savePath+newFileName);
		
		
		//파일명 rename
		if(!oldFile.renameTo(newFile)){
			
			//rename이 되지 않을 경우 강제로 파일을 복사하고 기존파일은 삭제
			
			buf=new byte[1024];
			fin=new FileInputStream(oldFile);
			fout=new FileOutputStream(newFile);
			read=0;
			
			while((read=fin.read(buf,0,buf.length))!=-1){
				fout.write(buf,0,read);
			}
			
			fin.close();
			fout.close();
			oldFile.delete();
		}
		
	}	catch(Exception e){
			e.printStackTrace();
	}
	
	out.print("name : "+RegisterBean.getRegister_name()+"<br>");
	out.print("ID : "+RegisterBean.getRegister_id()+"<br>");
	out.print("pw : "+RegisterBean.getRegister_pw()+"<br>");
	out.print("year : "+RegisterBean.getRegister_year()+"<br>");
	out.print("month : "+RegisterBean.getRegister_month()+"<br>");
	out.print("day : "+RegisterBean.getRegister_day()+"<br>");
	out.print("newFileName : "+newFileName);
	
	
	Register_Access.Register_insert(RegisterBean);
	
	response.sendRedirect("../index.jsp");
%>
</body>
</html>