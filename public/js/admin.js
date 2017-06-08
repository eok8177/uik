$(function () {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  //Change status of record
  $('.status').on('click', function (e) {
    e.preventDefault();
    var item = $(this);
    $.post({
        type: 'PUT',
        url: $(this).attr('href'),
        data: {'model':$(this).data('model'),'id':$(this).data('id')},
        dataType: 'json'
    }).done(function (data) {
        if (data.enabled == 1) {
          item.removeClass('fa-times-circle text-danger').addClass('fa-check-circle text-success');
        } else {
          item.removeClass('fa-check-circle text-success').addClass('fa-times-circle text-danger');
        }
    });
  });

  //Delete record
  $('.delete-item').on('click', function (e) {
    if (!confirm('Are you sure you want to delete?')) return false;
  e.preventDefault();
    $.post({
        type: 'DELETE',  // destroy Method
        url: $(this).attr('href')
    }).done(function (data) {
        console.log(data);
        location.reload(true);
    });
  })

  //Delete uploaded image in form
  $('#delete-image').on('click', function(){
    $('#thumbnail').val(null);
    $('#holder').attr('src', '');
    $(this).removeClass('hidden');
    $(this).addClass('hidden');
  });

  //laravel file manager
  $('#lfm').filemanager('image');

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