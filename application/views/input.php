<!DOCTYPE html>
<html>
<head>
	<title>Project Management Illiyin Studio</title>
</head>
<body>

	<form>

		<input type="checkbox" name="vehicle1" value="Bike" id="coba" >1<br>
		<input type="checkbox" name="vehicle2" value="Bike" id="cobaa" >2<br>

		<div id="coba2" style="display:none;">
			<input type="checkbox" name="vehicle1" value="Bike" id="check1" >1.1<br>
			<input type="checkbox" name="vehicle1" value="Bike" id="check2">1.2<br>
		</div>



		<div id="coba3" style="display:none;">
			<input type="checkbox" name="vehicle1" value="Bike" id="check3" >2.1<br>
			<input type="checkbox" name="vehicle1" value="Bike" id="check4" >2.2<br>
		</div>



	</form> 

	<script src="<?php echo base_url('style/js/jquery-3.2.1.min.js'); ?>" type="text/javascript"></script>


</script>

<script type="text/javascript">

	$(document).ready(function(){

	//JIKA CHECKED MAKA TAMPILKAN CHECKBOX LAIN
	$('#coba').change(function(){
		if(this.checked){	
			$('#coba2').show();
		}
		else{
			$('#coba2').hide();
			//UNCHECK jika ditutup
			$("#check1").prop("checked", false);
			$("#check2").prop("checked", false);
		}
	});

	//JIKA CHECKED MAKA TAMPILKAN CHECKBOX LAIN
	$('#cobaa').change(function(){
		if(this.checked)
			$('#coba3').show();
		else
			$('#coba3').hide();

			$("#check3").prop("checked", false);
			$("#check4").prop("checked", false);
	});

	


});

</script>

</body>
</html>