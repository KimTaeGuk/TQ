<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset=utf-8 />
	<title>Goods Erollment</title>
	<link rel="stylesheet" type="text/css" href="../css/Eroll.css">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>		<!-- jQuery -->
	<script src="../js/Eroll.js" type="text/javascript"></script>
</head>
<body>
<div id=FreeShipping><img src="../img/Cancel.PNG" id="img1"></div>
<div id=Cupon><img src="#" id="blah"></div>
<div id=Gifts><img src="../img/login.gif"></div>
<center>
<form name="Eroll_fm" method="POST" action="Eroll_proc.php" enctype="multipart/form-data" />
	<div style="width:1000px; height:2000px; position:relative">
			<div style="width:450px; height:450px; float:left; position:relative;">
				<div style="width:100%; height:auto; position:absolute; bottom:0px;">
				<input type="file" multiple="multiple" name="userfile[]" id="userfile[]" class="userfile" onchange="fileChk(this);" accept="image/jpg, image/gif, image/png"/>
						<!-- file -->
				<input type="hidden" name="MAX_FILE_SIZE" value="10000" /> <!-- 업로드할 파일의 최대 크기 -->
				</div>
			</div>
			<div style="width:450px; height:150px; float:right;">			
				<div style="width:450px; height:50px; float:right">
					<input type=text placeholder="Sub_explain" name="Sub_explain" />	<!-- Sub_ex -->
				</div>
				<input type=text placeholder="name" name="name"/>	<!-- name -->
			</div>
			<div style="width:450px; height:80px; float:right">
				<input type=text placeholder="price" name="price" onblur="Chk_int_onblur();"/>	<!-- price -->
			</div>
				<div id="Opt" name="Opt" style="width:450px; height:auto; float:right">
					<input type=hidden value="0" name="count"/>
					<input type="button" value="Add" onclick="Add_opt();" />
					<input type="button" value="Del" onclick='Del_opt();' />
								<div id="addedFormDiv"></div>
				</div>
			<div id="Sub" name="Sub" style="width:450px; height:130px; float:right; position:relative; top:0px; right:0px;">
				<input type="submit" value="Direct"/>
			</div>
	</div>
</form>
</center>
</body>
</html>