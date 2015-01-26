<!DOCTYPE html><head>
<meta charset="utf-8">
<title>Orders Table</title>
<script src="jquery-1.9.0.min.js"></script>
<script>
$(document).ready(function(e) {
    $("button").on('click',function(e){
		if($('input[type=file]').val()!=""){
			var file = $('input[type=file]')[0].files[0].name;
			var ext = file.split('.').pop().toLowerCase();
			if($.inArray(ext, ['csv']) == -1) {
				alert('invalid extension!');	
			}else{
				window.location = 'upload.php?csv='+file;	
			}
					
		
		}
		return false;	
	});
});
</script>
</head>


<input type="file" name="csv" value="" />
<button>Export now!</button>



 
