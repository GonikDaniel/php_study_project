$(document).ready(function(){
	$('#hw7_gallery img').on('click', function(){
		var img_id = $(this).attr("id");
		$('.hw7_wrapper').load('photo.php?img_id=' + img_id + '#hw7_full_image');
		$('.hw7_wrapper').css('display', 'block');	
		$('body').css('opacity', '.7');
	});
	$('.hw7_wrapper').on('click', function(){
		$('.hw7_wrapper').css('display', 'none');
		$('body').css('opacity', '1.0');
		location.reload();
	});
});

function like_plus(id) {
		var img_id = id;
		$.get( "ajax/likes.php?img_id=" + img_id , function( data ) {
			$( '#like_' + img_id ).next().html( data );
		});
}