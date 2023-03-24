$("#track_form").on("submit",function(e){
	jQuery.ajax({
		url: 'get_track.php',
		type: 'post',
		data: jQuery('#track_form').serialize(),
		success:function (result) {
			$('#track_data').html(result);
		}
	});
	e.preventDefault();

})