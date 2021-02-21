@section('script')
<script type="text/javascript">

  $(document).ready(function(){

 
  // CREATE NEWS
  create_news = () => {    
    // FORM PAYLOAD
    var formData = new FormData($("#createNewsForm")[0]);
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').html('');
    $('.invalid-feedback').hide();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('news.create') }}",
      type: 'post',
      data: formData,
      processData: false,
      contentType: false,           
      beforeSend: function(){
        // Show loader
        $('.btn').attr('disabled','disabled');
      },
      success: function(data){
        $('.btn').removeAttr('disabled');
        if(data['errors']){
          $.each(data['errors'], function(key, value){
            $('#'+key+'-err').show();
            $('#'+key).addClass('is-invalid');
            $('#'+key+'-err').append(value);   
            window.location.hash = '#'+key;
          });
        }else if (data['success']){
          $('#createNewsModal').modal('hide');
          $('.form-control').val('');
          SwalDoneSuccess.fire({
            title: 'Uploaded Successfully!',
            text: 'Uploaded Successfully',
          }).then((result) => {
            if(result.isConfirmed) {
              location.reload();
            }
          });
        }else if (data['error']){
          location.reload();
          SwalSystemErrorDanger.fire({
            title: 'Upload Failed!',
            text: 'Please Try Again or Contact Administrator: rovermoot.2021@gmail.com',
          })
        }
      },
      error: function(err){
        location.reload();
        $('.btn').removeAttr('disabled');
        SwalSystemErrorDanger.fire({
          title: 'Upload Failed!',
          text: 'Please Try Again or Contact Administrator: rovermoot.2021@gmail.com',
        })
      }
    });
  }
  // /CREATE NEWS


  // DELETE IMAGE
  delete_news = (id) => {

    SwalQuestionWarningAutoClose.fire({
      title: 'Are you sure?',
      text: 'Image will be deleted permanently.',
    }).then((result) => {
      if(result.isConfirmed){
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ route('news.delete') }}",
          type: 'post',
          data: {'id':id},          
          beforeSend: function(){
            // Show loader
            $('.btn').attr('disabled','disabled');
          },
          success: function(data){
            $('.btn').removeAttr('disabled');
            if (data['success'] = 'success'){
              SwalDoneSuccess.fire({
                title: 'News Deleted!',
                text: 'News deleted permanently',
              }).then((result) => {
                if(result.isConfirmed) {
                  location.reload()
                }
              });
            }else{
              SwalSystemErrorDanger.fire({
                title: 'Delete Failed!',
              });
            }
          },
          error: function(err){
            $('.btn').removeAttr('disabled');
            SwalSystemErrorDanger.fire();
          }
        });
      }else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Deletion Process Aborted!',
        });
      }
    });
  }
  // /DELETE IMAGE

  });

</script>
@endsection