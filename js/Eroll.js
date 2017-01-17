	$(document).ready(function(){
		document.getElementById("userfile[]").value="";
		document.getElementById("Main_img").value="";
		document.getElementById("Kategorie").selectedIndex=0;
	});

		
		function Kate(val){
			var sub_val=document.getElementById("Sub_Kategorie");
			sub_val.options.length=0;

			if(val.selectedIndex==1){
				var option=document.createElement('option');
				option.text="Warm";
				option.value="Warm";
				sub_val.add(option,sub_val[0]);

				var option=document.createElement('option');
				option.text="Picnic";
				option.value="Picnic";
				sub_val.add(option,sub_val[1]);

				var option=document.createElement('option');
				option.text="Dust";
				option.value="Dust";
				sub_val.add(option,sub_val[2]);
			}	
////////////////////////////////////////////////////////////////////////////////
			else if(val.selectedIndex==2){
				var option=document.createElement('option');
				option.text="2";
				option.value="2";
				sub_val.add(option,sub_val[0]);

				var option=document.createElement('option');
				option.text="22";
				option.value="22";
				sub_val.add(option,sub_val[1]);

				var option=document.createElement('option');
				option.text="222";
				option.value="222";
				sub_val.add(option,sub_val[2]);			
			}	
////////////////////////////////////////////////////////////////////////////////
			else if(val.selectedIndex==3){
				var option=document.createElement('option');
				option.text="3";
				option.value="3";
				sub_val.add(option,sub_val[0]);

				var option=document.createElement('option');
				option.text="33";
				option.value="33";
				sub_val.add(option,sub_val[1]);

				var option=document.createElement('option');
				option.text="333";
				option.value="333";
				sub_val.add(option,sub_val[2]);			
			}	
////////////////////////////////////////////////////////////////////////////////
			else if(val.selectedIndex==4){
				var option=document.createElement('option');
				option.text="4";
				option.value="4";
				sub_val.add(option,sub_val[0]);

				var option=document.createElement('option');
				option.text="44";
				option.value="44";
				sub_val.add(option,sub_val[1]);

				var option=document.createElement('option');
				option.text="444";
				option.value="444";
				sub_val.add(option,sub_val[2]);			
			}
		}




































		function readImg(input){
			var i=0;
			var reader = new FileReader();
			var imgfiles=document.getElementById("Main_img");
			var mainDiv=document.createElement("div");
			mainDiv.id="Main_Div";
			mainDiv.innerHTML="<img src='#' id='Bot_Img' alt='#'>";
			bottom_img.append(mainDiv);		

			reader.onload=function(e){
				$('#Bot_Img').attr('src', e.target.result);
			}
			reader.readAsDataURL(input.files[i]);
			return true;
		}
		function readURL(input){
			var i=0;
			var reader = new FileReader();
			var imgfiles=document.getElementById("userfile[]"),
			imgfiles_length=imgfiles.files.length;
			for(var i=0; i< imgfiles_length;i++){
				var addedDiv=document.createElement("div");
				addedDiv.className="mySlides fade";
				addedDiv.id="Img_Div";
				addedDiv.innerHTML="<img src='#' id='img"+i+"' alt="+i+">";
				slideshowcontainer.append(addedDiv);
				
				var addedSub=document.createElement("div");
				addedSub.id="Sub_Div";
				addedSub.innerHTML="<img src='#' id='subimg"+i+"' alt="+i+" onclick='currentSlide("+(i+1)+")'>";
				slideshowpointer.append(addedSub);

				reader.onload=function(e){
					$('#img'+i).attr('src', e.target.result);
					$('#subimg'+i).attr('src', e.target.result);	
				}
				reader.readAsDataURL(input.files[i]);
			alert(i);
			}
		}

		function imgChk(obj){
			$("div").remove("#Main_Div");
			pathpoint=obj.value.lastIndexOf('.');
			filepoint=obj.value.substring(pathpoint+1,obj.length);
			filetype=filepoint.toLowerCase();
			if(filetype=='jpg' || filetype=='gif' || filetype=='png' || filetype=='jpeg'){	readImg(obj);	}
			else {
				alert('Plz, Choose Image file\n(jpg, gif, png)');
				return false;
			}
		}

		function fileChk(obj){
			$("div").remove("#Img_Div");
			$("div").remove("#Sub_Div");
			pathpoint=obj.value.lastIndexOf('.');
			filepoint=obj.value.substring(pathpoint+1,obj.length);
			filetype=filepoint.toLowerCase();
			if(filetype=='jpg' || filetype=='gif' || filetype=='png' || filetype=='jpeg'){	readURL(obj);	}
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
			addedDiv.innerHTML=(count+1)+"<input type='text' name='opt["+count+"]' placeholder='Option["+(count+1)+"]' size=20><input type='text' name='opt_price["+count+"]' placeholder='price["+(count+1)+ "]' size=10>";
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