<?php
	echo ("
		<script>
			var name='".$_POST['name']."';
			for(i=0;i<name.length;i++){
				var ch=name.charAt(i);
				if(!ch.match(/([a-zA-Z])/)){
					document.getElementById('Speacial_Name').innerHTML='Do not use Speacial_Char';
				}
			}
		}
		</script>
		<span id='Speacial_Name'> </span>
	");
?>