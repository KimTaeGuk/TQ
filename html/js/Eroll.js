	$(document).ready(function(){});

		function fileChk(obj){
			pathpoint=obj.value.lastIndexOf('.');
			filepoint=obj.value.substring(pathpoint+1,obj.length);
			filetype=filepoint.toLowerCase();
			if(filetype=='jpg' || filetype=='gif' || filetype=='png'){
				readURL(obj);
			}
			else {
				alert('Plz, Choose Image file\n(jpg, gif, png)');
				return false;
			}
		}	// fileChk(obj)

		function readURL(input){
			$("div").remove("#Img_Div");
			$("div").remove("#Sub_Div");
			var i=0;

			var imgfiles=document.getElementById("userfile[]"),
			imgfiles_length=imgfiles.files.length;
			
			for(var i=0; i< imgfiles_length;i++){
				var j=i+1;
				var addedDiv=document.createElement("div");
				addedDiv.className="mySlides fade";
				addedDiv.id="Img_Div";
				addedDiv.innerHTML="<img src='#' id='img"+i+"' alt="+i+">";
				slideshowcontainer.appendChild(addedDiv);
				
				var addedSub=document.createElement("div");
				addedSub.id="Sub_Div";
				addedSub.innerHTML="<img src='#' id='subimg"+i+"' class='Sel_img' alt="+i+" onclick='currentSlide("+j+")' style='width:100%; height:100%;'>";
				slideshowpointer.append(addedSub);
			}	
			for(var i=0; i< imgfiles_length;i++){
				if(input.files && input.files[i]){
					var reader = new FileReader();
					reader.onload=function(e){
						$('#img'+i).attr('src', e.target.result);
						$('#subimg'+i).attr('src', e.target.result);					
					}
					reader.readAsDataURL(input.files[i]);
				}
				alert(i);
			}
		}

//Sel_img

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
			addedDiv.innerHTML=(count+1)+"<input type='text' name='opt"+count+"' placeholder='Option["+(count+1)+"]' size=20><input type='text' name='opt_price"+count+"' placeholder='price["+(count+1)+ "]' size=10>";
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

