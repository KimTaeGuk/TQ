<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<%@ page import="java.util.*" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Search ID</title>
<script src="../js/jquery-3.1.1.min.js"></script>
<script>
	$(document).ready(function(){
		var x=document.getElementById("day");
		x.options.length=0;
		for(var day=1; day<=31;day++){
			var option=document.createElement('option');
			option.text=day;
			option.value=day;
			x.add(option);
		}
	});
	
	//동적 일 수 생성 함수
	function appendDay(Day){
		var x=document.getElementById("day");
		x.options.length=0;
		switch(Day){
			case "2":
				for(var day=1; day<=29;day++){
					var option=document.createElement('option');
					option.text=day;
					option.value=day;
					x.add(option);
				}
				break;
			case "4":
			case "6":
			case "9":
			case "11":
				for(var day=1; day<=30;day++){
					var option=document.createElement('option');
					option.text=day;
					option.value=day;
					x.add(option);
				}
				break;
			default :
				for(var day=1; day<=31;day++){
					var option=document.createElement('option');
					option.text=day;
					option.value=day;
					x.add(option);
				}
				break;
		}
	}
</script>
</head>
<body>
	<H3>Search_ID</H3>
	<hr style="color:skyblue; background-color:skyblue; height:5px; border:none;" />
	<form method=post action='./Login_search_id_proc.jsp'>
	<table>
		<tr>
			<td>Name</td>
			<td><input type='text' name='search_name' /></td>
		</tr>
		<tr>
			<td>Birthday</td>
			<td>
				<select id="year" name="search_year">
				<%
					Calendar today=Calendar.getInstance();	//오늘 날짜를 받음
					int year=today.get(Calendar.YEAR);
					for(int i=1917;i<=year;year--){
				%>		<option value="<%=year%>"><%=year%></option>
				<%	
					}
				%>
				</select>년

				<select id="month" name="search_month" onchange="appendDay(this.value);">
				<%	
					for(int i=1;i<=12;i++){
				%>		<option value="<%=i%>"><%=i%></option>
				<%	
					}
				%>
				</select>월
				<select id="day" name="search_day">
				</select>일
			</td>
		</tr>
		<tr><td align='center' colspan='2'>
			<input type='submit' value='submit' /></td>
		</tr>
	</table>
	</form>
</body>
</html>