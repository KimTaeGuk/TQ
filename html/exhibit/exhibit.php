<!DOCTYPE HTML>
<HTML>
<HEAD>
<meta charset="utf-8">
	<TITLE></TITLE>
	<script src="../js/cycle2.js"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>		<!-- jQuery -->

	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
	<link rel="stylesheet" href="../css/image_slide.css">
</HEAD>
<BODY>
	<div id="container">
 		<div id="slideshow" class="cycle-slideshow"
data-cycle-fx="fade"
data-cycle-manual-fx="scrollHorz"
data-cycle-pager-fx="fade"
data-cycle-manual-speed="400"
data-cycle-prev="#prev"
data-cycle-next="#next"
data-cycle-speed="600"
data-cycle-timeout="3000"
data-cycle-pager="#pager"
data-cycle-pager-template="<a href='#'><img src='{{src}}' width=100 height=80></a>">
	<img src="../image/image1.jpeg" id="intro_img" />
	<img src="../image/image2.jpg" id="intro_img" />
	<img src="../image/image3.jpg" id="intro_img" />
	<img src="../image/image4.jpg" id="intro_img" />
	<img src="../image/image5.jpg" id="intro_img" />
	<img src="../image/image6.jpg" id="intro_img" />
	<img src="../image/image7.jpg" id="intro_img" />
</div> <!-- slideshow /div -->
<div id="pager"></div>
<div id="prev_c"><img id="prev" src="../image/prev1.svg" /></div>
<div id="next_c"><img id="next" src="../image/next1.svg" /></div>
</div> <!-- container /div-->

</BODY>
</HTML>