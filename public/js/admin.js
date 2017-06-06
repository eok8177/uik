$(function () {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  // $('.delete').click(function(e){
  //   if ( ! confirm('Are you sure?')) { return false; }
  // });

  //Delete uploaded image in form
  $('#delete-image').on('click', function(){
    $('#thumbnail').val(null);
    $('#holder').attr('src', '');
    $(this).removeClass('hidden');
    $(this).addClass('hidden');
  });

  //laravel file manager
  $('#lfm').on('click', function(){
    $('#delete-image').removeClass('hidden');
  });

  // CK Editor
  var options = {
    filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
    filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token='+ $('meta[name="csrf-token"]').attr('content'),
    filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
    filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='+ $('meta[name="csrf-token"]').attr('content')
  };
  $('textarea').ckeditor(options);
});