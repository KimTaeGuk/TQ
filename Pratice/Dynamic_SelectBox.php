<HTML>
<HEAD><TITLE></TITLE>
  <script src="http://code.jquery.com/jquery-latest.min.js"></script> 
	<script type="text/javascript">
	function changes(fr){
		if(fr==1){
			num=new Array("1)First","2)Second","3)Third");
			vnum=new Array("1","2","3");
		}	else if(fr==2){
			num=new Array("4)First","5)Second","6)Third");
			vnum=new Array("1","2","3");
		}

		for(i=0;i<form.test2.length;i++){
			form.test2.options[0]=null;
		}
		for(i=0;i<num.length;i++){
			document.form.test2.options[i]=new Option(num[i],vnum[i]);
		}
	}
	</script>
</HEAD>
<BODY>
	<div>
		<form name="form">
		<select name="test" onchange="changes(document.form.test.value)">
			<option value="">--Plz, Choice--</option>
			<option value="1">No.1</option>
			<option value="2">No.2</option>
		</select>
		
		<select name="test2">
			<option>--Small classification--</option>
		</select>
		</form>
	</div>
</BODY>
</HTML>