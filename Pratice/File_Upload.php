<?php
	$_FILES['userfile']['name'][$i]=date("his").$_FILES['userfile']['name'][$i];
	echo $_FILES['userfile']['name'][$i]."<br />";

	$upfile = '../Upload_img/'.$_FILES['userfile']['name'][$i];
	// if($_FILES['userfile']['error'][$i] > 0){
	//  	switch($_FILES['userfile']['error'][$i]){
	//  		case 1: echo "파일 크기 초과"; break;
	//  		case 2:	echo "파일 크기 초과"; break;
	//  		case 3:	echo "업로드 실패"; break;
	//  		case 4:	echo "파일이 없음"; break;
	//  		case 6:	echo "특정 파일을 업로드 할 수 없음"; break;
	//  		case 7:	echo "디스크에 저장할 수 없음"; break;
	//  	}
	// exit;
	//  }
	if(is_uploaded_file($_FILES['userfile']['tmp_name'][$i]))
	{
		if(!move_uploaded_file($_FILES['userfile']['tmp_name'][$i], $upfile))
		{
	 		echo "Problem : 저장소가 없음";	//권한이 없으면 오류가 생김
	 		exit;
	 	}
	}	
	// else { 
	//  	echo "공격 파일이당 : ";
	//  	echo $_FILES['userfile']['name'][$i];
	//  	exit;
	// }
}

?>