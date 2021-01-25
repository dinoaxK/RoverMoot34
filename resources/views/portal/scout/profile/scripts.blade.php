@section('script')
<script type="text/javascript">

  // UPDATE PASSWORD
  update_password = () => {
    
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').html('');
    $('.invalid-feedback').hide();


    // FORM PAYLOAD
    var formData = new FormData($("#changePassword")[0]);

    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('change.password') }}",
      type: 'post',
      data: formData,  
      processData: false,
      contentType: false,         
      beforeSend: function(){
        // Show loader
        $("#spinnerPassword").removeClass('d-none');
        $('#btnChangePassword').attr('disabled','disabled');
      },
      success: function(data){
        $("#spinnerPassword").addClass('d-none');
        $('#btnChangePassword').removeAttr('disabled');
        if(data['errors']){
          $.each(data['errors'], function(key, value){
            $('#error-'+key).show();
            $('#error-'+key).show();
            $('#'+key).addClass('is-invalid');
            $('#error-'+key).append('<strong>'+value+'</strong>')
          });
        }else if (data['success']){
          $('.form-control').val('');
          SwalDoneSuccess.fire({
            title: 'Password Updated!',
            text: 'Please Login with New Password to Continue',
          }).then((result) => {
            if(result.isConfirmed) {
              event.preventDefault(); 
              document.getElementById('logout-form').submit();
            }
          });
          
        }else if (data['error']){
          SwalErrorDanger.fire({
            title: 'Pasword Update Failed!',
            text: 'Please Try Again or Contact Administrator: admin@fit.bit.lk',
          })
        }
      },
      error: function(err){
        $("#spinnerPassword").addClass('d-none');
        $('#btnChangePassword').removeAttr('disabled');
        SwalErrorDanger.fire({
          title: 'Pasword Update Failed!',
          text: 'Please Try Again or Contact Administrator: admin@fit.bit.lk',
        })
      }
    });
  }
  // /UPDATE PASSWORD

</script>
@endsection