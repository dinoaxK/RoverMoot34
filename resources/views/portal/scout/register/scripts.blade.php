@section('script')
<script type="text/javascript">
  // SAVE PAYMENT
  submit_scout = () => {

    
    // FORM PAYLOAD
    var formData = new FormData($("#scoutRegisterForm")[0]);
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').html('');
    $('.invalid-feedback').hide();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('register') }}",
      type: 'post',
      data: formData,
      processData: false,
      contentType: false,           
      beforeSend: function(){
        // Show loader
        $("#btnSubmitScoutSpinner").removeClass('d-none');
        $('#btnSubmitScout').attr('disabled','disabled');
      },
      success: function(data){
        $("#btnSubmitScoutSpinner").addClass('d-none');
        $('#btnSubmitScout').removeAttr('disabled');
        if(data['errors']){
          $.each(data['errors'], function(key, value){
            $('#'+key+'-err').show();
            $('#'+key).addClass('is-invalid');
            $('#'+key+'-err').append('<strong>'+value+'</strong>');   
            window.location.hash = '#'+key;
          });
        }else if (data['success']){
          $('.form-control').val('');
          SwalDoneSuccess.fire({
            title: 'Payment Submitted to review!',
            text: 'You\'ll be notified once reviewed',
          }).then((result) => {
            if(result.isConfirmed) {
              location.reload()
            }
          });
        }else if (data['error']){
          SwalSystemErrorDanger.fire({
            title: 'PaymentFailed!',
            text: 'Please Try Again or Contact Administrator: admin@fit.bit.lk',
          })
        }
      },
      error: function(err){
        $("#btnSubmitScoutSpinner").addClass('d-none');
        $('#btnSubmitScout').removeAttr('disabled');
        SwalSystemErrorDanger.fire({
          title: 'PaymentFailed!',
          text: 'Please Try Again or Contact Administrator: admin@fit.bit.lk',
        })
      }
    });
  }
  // /SAVE PAYMENT
</script>
@endsection