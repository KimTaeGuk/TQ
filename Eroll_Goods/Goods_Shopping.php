<?php	
	require_once('../config/db_connect.php');
	require_once('../config/mysql_result.php');

	$sql="select * from Goods where Goods_name='$_GET[Goods_name]' && Sub_explain='$_GET[Goods_explain]'";
	$result=$con->query($sql);

	$Goods_name=mysql_result($result, 0, "Goods_name");
	$Sub_explain=mysql_result($result, 0, "Sub_explain");
	$Price=mysql_result($result, 0, "Price");
	$Options=mysql_result($result, 0, "Options");
	$Options_price=mysql_result($result, 0, "Options_price");
	$Slide_img=mysql_result($result, 0, "image");
	$Main_img=mysql_result($result, 0, "Main_img");

	if($result->num_rows > 0){
		while($row=$result->fetch_assoc()){
			//echo $row["Goods_name"];
		}
	}	else {}
?>
<!DOCTYPE HTML>
<HTML lang="ko">
<HEAD>
<meta charset=utf-8 />
	<TITLE>Shopping</TITLE>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>		<!-- jQuery -->
	<link rel="stylesheet" href="../css/Goods_Shopping.css">
	<link rel="stylesheet" href="../css/Eroll.css">

	<script>
			//Slide_img
			var sli_img="<?= $Slide_img ?>";
			var Slied_img=sli_img.split(";");
		
		window.onload=function(){
			//Options
			var sel="<?= $Options ?>";
			var sel_price="<?= $Options_price ?>";
			var Options=sel.split(";");
			var Options_price=sel_price.split(";");
			Opt=document.getElementsByName("Options");

			for(var i in Options){
			sel_opt=Options[i]+"+("+Options_price[i]+")";
			Opt[i].text=sel_opt;
			Opt[i].value=Options[i]+";"+Options_price[i];
			}

////////////////////////////////////////////////////////////////////////////////////////////////
			SlideTag=document.getElementById("slideshowcontainer");
			//Slide_img
			for(var i in Slied_img){
				var Slide_Div=document.createElement("div");
					Slide_Div.className="mySlides fade";
					Slide_Div.innerHTML="<img src=../Upload_img/"+Slied_img[i]+" style='width:450px; height:450px;'>";
					
				if(document.getElementById("Slides_Div")){
					slideshowcontainer.append(Slide_Div);
				}	else {
					$("#slideshowcontainer").html("<div id='Slides_Div' class='mySlides fade'><img src='../Upload_img/"+Slied_img[i]+"' style='width:450px; height:450px;'></div><a class='prev' onclick='plusSlides(-1)'><</a><a class='next' onclick='plusSlides(1)'>></a>");
				}

				var j=i; ++j;
				var Bot_Slide=document.createElement("div");
					Bot_Slide.id="Bot_Slide";
					Bot_Slide.innerHTML="<img src=../Upload_img/"+Slied_img[i]+" style='width:100%; height:100%;' onclick='currentSlide("+j+")'>";
					Bot_Slide_Div.appendChild(Bot_Slide);
			}
////////////////////////////////////////////////////////////////////////////////////////////////

			//Main_img
			var img="<?= $Main_img ?>";
			Mimg=document.getElementById("Main_img");
			Mimg.src="../Upload_img/"+img;
		}

		function basket(){
			var i=document.getElementById("image_1");
			i.value=Slied_img[0];
			document.Shopping.action="../Basket/Basket_proc.php";
			document.Shopping.submit();
		}
	</script>
</HEAD>
<BODY>
<center>
<form name="Shopping" method="POST" action="Shopping_proc.php" enctype="multipart/form-data" />
	
	<!--  장구니에전송할 정보(첫 번째 이미지, 상품 이름, 가격, 갯수) -->
	<input type="hidden" name="Goods_name" value="<?=$Goods_name?>">
	<input type="hidden" name="Price" value="<?=$Price?>">
	<input type="hidden" name="image" id="image_1" value="">

	<div align="left" style="width:1000px; height:1500px; position:relative">
	<div style="float:left; width:450px; height:500px;">
		<div class="slideshowcontainer" id="slideshowcontainer" style="float:left;"></div>
		<div id="Bot_Slide_Div" style="width:450px; height:50px; position:relative; border:1px solid red;"></div>
	</div>
		<div style="width:450px; height:150px; right:0px; position:absolute;">
			<div style="position:relative; top:0px;">
			<?php 	echo "<font size=4pt style='color:gray;'>".$Sub_explain."</font>"; ?>
			</div>
			<?php 	echo "<font size=6pt style=''>".$Goods_name."</font>"; ?>
		</div>
		<div style="position:absolute; width:450px; height:150px; top:150px; right:0px;">
			<?php	echo "<font size=6pt style=''>".$Price."</font>"; ?>
		</div>

		<div style="position:absolute; width:450px; height:150px; top:300px; right:0px;">
			Select <select id="Opt" name="Opt_pri" style="width:395px;">
				<option value="AS" id="AS" name="Options"></option>
				<option value="ZX" id="ZX" name="Options"></option>
				<option value="CV" id="CV" name="Options"></option>
			</select>
		</div>
		<div style="position:absolute; text-align: center; width:450px; height:50px; top:450px; right:0px;">
		Quantity
		<select name="Quantity">
			<option>1</option><option>2</option><option>3</option><option>4</option><option>5</option>
			<option>6</option><option>7</option><option>8</option><option>9</option><option>10</option>
		</select>
		<input type="button" id="Basket" value="Basket" onclick="basket();"> / <input type="button" id="Direct" value="Direct">
		</div>
		<div>
		<div style="float:left; text-align: center; width:100%; height:auto; ">
		<img src="#" id="Main_img" style="width:100%; height:auto;">
		</div>
	</div>
</form>
</center>
	<script src="../js/SlideShow.js"></script>
</BODY>
</HTML>
<?php		
	$result->free();
	$con->close();
?>