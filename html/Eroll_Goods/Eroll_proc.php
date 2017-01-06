<?php

	echo (count($_FILES['userfile']['name']));

	$num=count($_FILES['userfile']['name']);
	
for($i=0;$i<$num;$i++){
	echo $_FILES['userfile']['tmp_name'][$i]."<br>";
	echo $_FILES['userfile']['name'][$i]."<br>";
	echo $_FILES['userfile']['size'][$i]."<br>";
	echo $_FILES['userfile']['type'][$i]."<br>";
	echo $_FILES['userfile']['error'][$i]."<br>";

	$upfile = '../Pratice/'.$_FILES['userfile']['name'][$i];

	if($_FILES['userfile']['error'][$i] > 0){
	 	echo 'Problem: ';
	 	switch($_FILES['userfile']['error'][$i]){
	 		case 1: echo "파일 크기 초과";
	 				break;
	 		case 2:	echo "파일 크기 초과";
	 				break;
	 		case 3:	echo "업로드 실패";
	 				break;
	 		case 4:	echo "파일이 없음";
	 				break;
	 		case 6:	echo "특정 파일을 업로드 할 수 없음";
	 				break;
	 		case 7:	echo "디스크에 저장할 수 없음";
	 				break;
	 	}
	exit;
	 }

	if($_FILES['userfile']['type'][$i] != 'image/png' && $_FILES['userfile']['type'][$i] != 'image/jpeg' && $_FILES['userfile']['type'][$i] != 'image/gif'){
	   	echo "파일형식 미지원";
	   	exit;
	}

	if(is_uploaded_file($_FILES['userfile']['tmp_name'][$i]))
	{
		if(!move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $upfile))
		{
	 		echo "Problem : 저장소가 없음";	//권한이 없으면 오류가 생김
	 		exit;
	 	}
	}
	else { 
	 	echo "공격 파일이당 : ";
	 	echo $_FILES['userfile']['name'][$i];
	 	exit;
	}

	echo 'Success';
}







	// echo nl2br($contents);
	// echo "<br /> <hr />"


	// echo ($_POST['name']."<br>");
	// echo ($_POST['Sub_explain']."<br>");
	// echo ($_POST['price']."<br>");
	// echo ($_POST['count']."<br>");

	// for($i=0; $i<$_POST['count'];$i++){
	// 	echo ($_POST["opt".$i]."<br>");
	// 	echo ($_POST["opt_price".$i]."<br>");
	// }
include('../config/db_connect.php');

mysqli_close();
?>