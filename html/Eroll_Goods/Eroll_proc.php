<?php
	echo $_FILES['userfile']['tmp_name']."<br>";
	echo $_FILES['userfile']['name']."<br>";
	echo $_FILES['userfile']['size']."<br>";
	echo $_FILES['userfile']['type']."<br>";
	echo $_FILES['userfile']['error']."<br>";
	if($_FILES['userfile']['error'] > 0){
	 	echo 'Problem: ';
	 	switch($_FILES['userfile']['error']){
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

	if($_FILES['userfile']['type'] != 'image/png' && $_FILES['userfile']['type'] != 'image/jpeg' && $_FILES['userfile']['type'] != 'image/gif'){
	   	echo "파일형식 미지원";
	   	exit;
	}

	$upfile = "../Pratice/".$_FILES['userfile']['name'];

	if(is_uploaded_file($_FILES['userfile']['tmp_name']))
	{
		if(!move_uploaded_file($_FILES['userfile']['tmp_name'], $upfile))
		{
	 		echo "Problem : 저장소가 없음";	//권한이 없으면 오류가 생김
	 		exit;
	 	}
	}
	else { 
	 	echo "공격 파일이당 : ";
	 	echo $_FILES['userfile']['name'];
	 	exit;
	}

	echo 'Success';

	$contents = file_get_contents($upfile);
		$contents = strip_tags($contents);
	file_put_contents($_FILES['userfile']['name'], $contents);

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