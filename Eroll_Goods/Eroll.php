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
<div id=FreeShipping>Free Shipping</div>
<div id=Cupon>Cupon</div>
<div id=Gifts>Gifts</div>
<center>
<form name="Eroll_fm" method="POST" action="Eroll_proc.php" enctype="multipart/form-data" />
	<div style="width:1000px; height:1500px; position:relative">
			<div style="width:450px; height:450px; float:left; position:relative;">
				<div class="slideshowcontainer" id="slideshowcontainer" style="width:auto; height:200px">
					<a class="prev" onclick="plusSlides(-1)"><</a>
					<a class="next" onclick="plusSlides(1)">></a>				
				</div>
				<div id="slideshowpointer" style="text-align:center; display:table-cell; width:auto; height:auto; background:yellow; position:relative;">
				</div>	
				<div style="width:100%; height:auto; position:absolute; bottom:0px;">
					<input type="file" multiple="multiple" name="userfile[]" id="userfile[]" class="userfile" onchange="fileChk(this);" accept="image/jpg, image/gif, image/png, image/jpeg"/>		<!-- file -->	
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






			<div style="width:450px; height:100px; float:right; position:relative; top:0px; right:0px;">
				<select id='Kategorie' name='Kategorie' onchange="Kate(this);">
				<option value="">1차분류</option>
				<option value="Spring">Spring</option>
				<option value="Summer">Summer</option>
				<option value="fall">fall</option>
				<option value="Winter">Winter</option>
				</select>
				<select id='Sub_Kategorie' name='Sub_Kategorie'>
				<option>1차분류를 먼저 선택하세요</option>
				</select>
			</div>









			<!-- Submit -->
			<div id="Sub" name="Sub" style="width:450px; height:50px; float:right; position:relative; top:0px; right:0px;">
				<input type="submit" value="Direct"/>
			</div>

			<!-- Bottom_IMAGE -->
			<div style="position:absolute; bottom:0px; width:auto; height:200px;">
				<div id="bottom_img" style="height:auto; width:auto;"></div>
				<input type=file name="Main_img" id="Main_img" onchange="imgChk(this);" accept="image/jpg, image/gif, image/png, image/jpeg"/>
			</div>
	</div>
					
</form>
</center>
	<script src="../js/SlideShow.js" type="text/javascript"></script>

</body>
</html>