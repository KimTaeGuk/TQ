<?php	
	require_once('../config/db_connect.php');
	require_once('../config/mysql_result.php');

	$sql="select * from Goods where kategorie='Spring' && Sub_kategorie='Warm'";
	$result=$con->query($sql);

	if($result->num_rows > 0){
		while($row=$result->fetch_array()){
			//$img=explode(";",$row[image]);	#Array_Image
		}
	}	else {};
	
	$num_row=$result->num_rows;

	for($count=0;$count<$num_row;$count++){
		$Goods_name[$count]=mysql_result($result,$count,Goods_name);
		$Sub_explain[$count]=mysql_result($result,$count,Sub_explain);
		$Price[$count]=mysql_result($result,$count,Price);
		$Options[$count]=mysql_result($result,$count,Options);
		$Options_price[$count]=mysql_result($result,$count,Options_price);
		$image[$count]=mysql_result($result,$count,image);
		//자바 배열에 넣기위해 이중배열로 만드는 반복문
		for($count2=0;$count2<count(explode(";",$image[$count]));$count2++){
			$img[$count]=explode(";",$image[$count]);
		}
	}
?>
<!DOCTYPE HTML>
<HTML>
<HEAD>
	<TITLE></TITLE>
	<script src="../js/Goods_Shopping.js"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>		<!-- jQuery -->
	<link rel="stylesheet" href="../css/Eye_Goods.css">
<script>
//자바배열로 바로 옮겨주는 json_encode
var idx=1;
var img=<?php echo json_encode($img) ?>;
var Goods_name=<?php echo json_encode($Goods_name) ?>;
var Sub_explain=<?php echo json_encode($Sub_explain) ?>;
var Price=<?php echo json_encode($Price) ?>;
var Options=<?php echo json_encode($Options) ?>;
var Options_price=<?php echo json_encode($Options_price) ?>;
	
window.onload=function(){
		for(i=0;i<img.length;i++){addDivs(i);}
		for(i=0;i<img.length;i++){addDivs(i);}
	}
</script>
</HEAD>
<BODY>
<center>
<form id="Shopping" name="Shopping" method="get" action="Goods_Shopping.php" enctype="multipart/form-data" />
<div id='Main_Div'>
<script>
	//Div 동적 생성
	function addDivs(num){
		var newDiv=document.createElement('DIV');
		newDiv.setAttribute('id','Goods_div'+idx);
		newDiv.setAttribute('class','Goods_div');
		newDiv.innerHTML="<div><img src=../Upload_img/"+img[num][0]+" style='width:100px; height:80px;'></div><div>"+ Goods_name[num] +"</div>";
		newDiv.onclick=function(){
			var Goods_node=document.createElement("input");
			Goods_node.setAttribute("type","hidden");
			Goods_node.setAttribute("name","Goods_name");
			Goods_node.setAttribute("value",Goods_name[num]);
			Goods_node.setAttribute("class","Goods_num hidden");

			var Goods_explain=document.createElement("input");
			Goods_explain.setAttribute("type","hidden");
			Goods_explain.setAttribute("name","Goods_explain");
			Goods_explain.setAttribute("value",Sub_explain[num]);
			Goods_explain.setAttribute("class","Goods_Image hidden");

			Main_Div.appendChild(Goods_node);
			Main_Div.appendChild(Goods_explain);
			
			$('#Shopping').submit();
			$(".hidden").remove();
		}
		Main_Div.appendChild(newDiv);
		idx++;
	}

</script>
</div>
</form>
</center>
</BODY>
</HTML>
<?php		
	$result->free();
	$con->close();
?>