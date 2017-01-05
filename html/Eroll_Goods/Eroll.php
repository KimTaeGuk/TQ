<!DOCTYPE html>
<html lang="ko">
<head>
	<title>Goods Erollment</title>
	<link rel="stylesheet" type="text/css" href="../css/Eroll.css">
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>		<!-- jQuery -->
	<script>
		function fileChk(obj){
			pathpoint=obj.value.lastIndexOf('.');
			filepoint=obj.value.substring(pathpoint+1,obj.length);
			filetype=filepoint.toLowerCase();
			if(filetype=='jpg' || filetype=='gif' || filetype=='png'){
				$("#img1").attr("src", "../img/"+obj.value);
			}
			else {
				alert('Plz, Choose Image file\n(jpg, gif, png)');
				return false;
			}
		}	// fileChk(obj)
		function Chk_int_onblur(){
			var fm=document.Eroll_fm;
			if(isNaN(fm.price.value)){
				alert("U must write only int");
				fm.price.select();
			}
		}	// Chk_int_onblur()
	
	var count=0;
		function Add_opt(){
			var addedDiv=document.createElement("div");
			addedDiv.id="added["+count+"]";
			addedDiv.innerHTML=(count+1)+"<input type='text' name='opt"+count+"' placeholder='Option["+(count+1)+"]' size=20><input type='text' name='opt_price"+count+"' placeholder='price["+(count+1)+ "]' size=10>";
			addedFormDiv.appendChild(addedDiv);

			count++;
			document.Eroll_fm.count.value=count;
		}	//Add_opt()
		function Del_opt(){
			if(count>0){
				var addedDiv=document.getElementById("added["+(--count)+"]");
				addedFormDiv.removeChild(addedDiv);
				document.Eroll_fm.count.value=count;
			}
		}	//Del_opt()

	</script>
</head>
<body>
<div id=FreeShipping><img src="../img/Cancel.PNG" id="img1"></div>
<div id=Cupon><img src="../img/loading.gif"></div>
<div id=Gifts><img src="../img/login.gif"></div>
<center>
<form name="Eroll_fm" method="POST" action="Eroll_proc.php" enctype="multipart/form-data" />

	<div style="width:1000px; height:2000px">
			<div style="width:450px; height:450px; float:left;">
				<input type="file" name="userfile" id="userfile"  onchange="fileChk(this);" accept="image/jpg, image/gif, image/png"/>		<!-- file -->
				<input type="hidden" name="MAX_FILE_SIZE" value="10000" /> <!-- 업로드할 파일의 최대 크기 -->
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
				<div style="width:450px; height:auto; float:right">
					<input type=hidden value="0" name="count"/>
					<input type="button" value="Add" onclick='Add_opt();' />
					<input type="button" value="Del" onclick='Del_opt();' />
								<div id="addedFormDiv"></div>
				</div>
			<div style="width:450px; height:130px; float:right;">
				<input type="submit" value="Direct"/>
			</div>
	</div>
</form>
</center>
</body>
</html>