<?php
	session_start();

	$Options=implode(';',$_POST['opt']);
	$Options_price=implode(';',$_POST['opt_price']);

	$num = count($_FILES['userfile']['name'])."<br />";

	if(!$_SESSION['id']){ echo("<script> alert('아이디가 없습니다.'); history.go(-1); </script>");
	   				       exit; }
	if(strlen($_POST['Kategorie'])<=0){ echo("<script> alert('1차분류가 없습니다.'); history.go(-1); </script>");
 	   	       			exit; }
	if(!$_POST['name']){ echo("<script> alert('No exists Name'); history.go(-1); </script>");
	    				       exit; }
	if(!$_POST['price']){ echo("<script> alert('No exists Price'); history.go(-1); </script>");
	    				       exit; }

	$_FILES['Main_img']['name']=date("his").$_FILES['Main_img']['name'];
	$Main_imgup = '../Upload_img/'.$_FILES['Main_img']['name'];

	if(is_uploaded_file($_FILES['Main_img']['tmp_name']))
	{
		if(!move_uploaded_file($_FILES['Main_img']['tmp_name'], $Main_imgup))
		{
	 		echo "Problem[Main] : 저장소가 없음";	//권한이 없으면 오류가 생김
	 		exit;
	 	}
	}	

for($i=0;$i<$num;$i++){

	$_FILES['userfile']['name'][$i]=date("his").$_FILES['userfile']['name'][$i];
	echo $_FILES['userfile']['name'][$i]."<br />";

	$upfile = '../Upload_img/'.$_FILES['userfile']['name'][$i];

	if(is_uploaded_file($_FILES['userfile']['tmp_name'][$i]))
	{
		if(!move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $upfile))
		{
	 		echo "Problem[userfile] : 저장소가 없음";	//권한이 없으면 오류가 생김
	 		exit;
	 	}
	}	
}

	echo "<br /><br />------------------------------------------------------------------<br /><br />";

	$image=implode(';', $_FILES['userfile']['name']);
	$Main_img=$_FILES['Main_img']['name'];
	echo ("id=".$_SESSION['id']."<br>");
	echo ("Name = ".$_POST['name']."<br>");
	echo ("Sub_explain = ".$_POST['Sub_explain']."<br>");
	echo ("Price = ".$_POST['price']."<br>");
	echo ("Options = ".$Options."<br>");
	echo ("Options_price = ".$Options_price."<br>");
	echo ("image = ".$image."<br>");
	echo ("Main_img = ".$Main_img."<br>");
	echo $_POST['Kategorie']."<br />";
	echo $_POST['Sub_Kategorie'];

include('../config/db_connect.php');

mysqli_query($con, "insert into Goods(session_id  ,Goods_name  ,Sub_explain  ,Price  ,Options  ,Options_price  ,image, Main_img, kategorie, Sub_kategorie) values ('$_SESSION[id]'  ,'$_POST[name]'  ,'$_POST[Sub_explain]'  ,'$_POST[price]'  ,'$Options'  ,   '$Options_price',   '$image', '$Main_img', '$_POST[Kategorie]', '$_POST[Sub_Kategorie]')");
mysqli_close();
?>