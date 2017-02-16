<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<!-- <script>
function previewFiles() {

	  var preview = document.querySelector('#preview');
	  var files   = document.querySelector('input[type=file]').files;

	  function readAndPreview(file) {

	    // `file.name` 형태의 확장자 규칙에 주의하세요
	    if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
	      var reader = new FileReader();

	      reader.addEventListener("load", function () {
	        var image = new Image();
	        image.height = 100;
	        image.title = file.name;					//alt 마우스 오버시 나오는것
	        image.name=file.name;
	        image.src = this.result;
	        preview.appendChild( image );
	      }, false);

	      reader.readAsDataURL(file);
	    }
	  }

	  if (files) {
	    [].forEach.call(files, readAndPreview);
	  }

	}
</script> -->
</head>
<body>
<div id="preview"></div>
<form name="fileForm" id="fileForm" method="POST" action="Goods_write_proc.jsp" enctype="multipart/form-data">
<input name="browse" id="browse" type="file" onchange="previewFiles()" multiple>
<input type="submit" value="파일 전송" />
</form>
</body>
</html>