	$(document).ready(function(){
		function readURL(input){
			if(input.files && input.files[0]){
				var reader = new FileReader();
				reader.onload=function(e){
					$('#blah').attr('src', e.target.result);
				}
				reader.readAsDataURL(input.files[0]);
			}
		}
		$(".userfile").change(function(){
			readURL(this);
		});
	});


		function fileChk(obj){
			pathpoint=obj.value.lastIndexOf('.');
			filepoint=obj.value.substring(pathpoint+1,obj.length);
			filetype=filepoint.toLowerCase();
			if(filetype=='jpg' || filetype=='gif' || filetype=='png'){}
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
