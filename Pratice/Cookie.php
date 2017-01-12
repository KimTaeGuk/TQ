<!DOCTYPE HTML>
<HTML>
<HEAD>
	<TITLE>Cookie Practice</TITLE>

	<script src="http://code.jquery.com/jquery-1.6.2.min.js"></script>

	<script>
		$(document).ready(function(){
			var userInputid=getCookie("userInputid");
			$("input[name='id']").val(userInputid);

			if($("input[name='id']").val() != "") {
				$("#idSaveCheck").attr("checked",true);
			}

			$("#idSaveCheck").change(function(){
				if($("#idSaveCheck").is(":checked")){
					var userInputid=$("input[name='id']").val();
					setCookie("userInputid", userInputid,7);
				} else {
					deleteCookie("userInputid");
				}
			});
			$("input[name='id']").keyup(function(){
				if($("#idSaveCheck").is(":checked")){
					var userInputid=$("input[name='id']").val();
					setCookie("userInputid", userInputid, 7);
				}
			});
		});

		function setCookie(cookieName, value, exdays) {
			var exdate=new Date();
			exdate.setDate(exdate.getDate()+exdays);
			var cookieValue=escape(value)+((exdays==null)? "" : "; expires="+exdate.toGMTString());
			document.cookie=cookieName+"="+cookieValue;
		}

		function getCookie(cookieName){
			cookieName=cookieName+'=';
			var cookieData=document.cookie;
			var start=cookieData.indexOf(cookieName);
			var cookieValue='';
			if(start != -1){
				start += cookieName.length;
				var end=cookieData.indexOf(';',start);
				if(end == -1) end=cookieData.length;
				cookieValue=cookieData.substring(start,end);
			}
			retrun unescape(cookieValue);
		}
	</script>
</HEAD>
<BODY>
	<input type="text" name="id"><input type="checkbox" id="idSaveCheck">
</BODY>
</HTML>