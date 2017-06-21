function postForm( $form, callback ){
  /*
   * Get all form values
   */
  var values = {};
  $.each( $form.serializeArray(), function(i, field) {
    values[field.name] = field.value;
  });
 
  /*
   * Throw the form values to the server!
   */
  $.ajax({
    type        : $form.attr( 'method' ),
    url         : $form.attr( 'action' ),
    data        : values,
    success     : function(data) {
      callback( data );
    }
  }); 
}


$(document).ready(function(){
	$.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

	$('.newsletter-form,.feedback-form').submit(function(e){
		e.preventDefault();
		alert('Thank you!');
		postForm($(this), function(response){});
		$(this).trigger("reset");
		return false;
	}); 
	
	
});
