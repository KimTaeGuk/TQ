<%@page import="java.util.Enumeration"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    
<!-- 파일 업로드 처리를 위한 MultipartRequest 객체를 임포트 -->
<%@ page import="com.oreilly.servlet.MultipartRequest" %>
<!-- 파일 중복 처리 객체 임포트 -->
<%@ page import="com.oreilly.servlet.multipart.DefaultFileRenamePolicy" %>
<%@ page import="java.io.*"%>
<%@ page import="java.util.Date" %>
<%@ page import="java.text.SimpleDateFormat" %>
<%@ page import="java.util.Vector" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Insert title here</title>
</head>
<body>
<%
String uploadPath="D:\\upload\\";

int size=10*1024*1024;

try{
	//MultipartRequest를 사용할 경우 파일 이름을 변경하여 업로드 할 수 없다
	//new MultipartRequest(request, 파일 저장 경로, 파일크기, 인코딩)
	MultipartRequest multi=new MultipartRequest(request,uploadPath,size,"UTF-8", new DefaultFileRenamePolicy());

	//enumeration 크기를 알 수 없다
	Enumeration params=multi.getParameterNames();
	
	while(params.hasMoreElements()){
		out.println("A");
	}
	
}	catch(FileNotFoundException e){
		e.printStackTrace();
}	finally {
		
}
	
	/* 	String uploadPath="D:\\upload\\";

	int size=10*1024*1024;

	String filename="";
	String newFileName="";
	
	try{
		MultipartRequest multi=new MultipartRequest(request,uploadPath,size,"UTF-8", new DefaultFileRenamePolicy());
		
		Enumeration files=multi.getFileNames();
		
			String file=(String)files.nextElement();
			filename=multi.getFilesystemName(file);
			
			long currentTime=System.currentTimeMillis();
			SimpleDateFormat simDf=new SimpleDateFormat("yyyyMMddHHmmss");
			
			newFileName=simDf.format(new Date(currentTime))+filename;
			
			
			File oldFile=new File(uploadPath+filename);
			File newFile=new File(uploadPath+newFileName);
			
	 		if(!oldFile.renameTo(newFile)){
				byte[] buf=new byte[1024];
				FileInputStream fin=new FileInputStream(oldFile);
				FileOutputStream fout=new FileOutputStream(newFile);
				int read=0;
				while((read=fin.read(buf,0,buf.length))!=-1){
					fout.write(buf,0,read);
				}
				fin.close();
				fout.close();
				oldFile.delete();
			}

	}	catch(Exception e){
		
	}
	out.print("파일명"+filename+"<br>"); */
	
%>
</body>
</html>