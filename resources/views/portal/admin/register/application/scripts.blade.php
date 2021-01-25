@section('script')
<script type="text/javascript">

$(document).ready(function(){
  $('body').css('background-color', '#fff');
  $('footer').addClass('d-none');
  $('nav').addClass('d-none');
  $('.text-white').addClass('text-dark');

});

// APPROVE
  approve = () => {
    SwalQuestionSuccess.fire({
      title: "Are you sure ?",
      text: "This Registration Will Be Approved",
      confirmButtonText: "Yes, Approve!",
    })
    .then((result) => {
      if (result.isConfirmed) {
        
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ route('approve.application') }}",
          type: 'post',
          data: { 'message': result.value, 'id': "{{ $participant->id }}"},         
          beforeSend: function(){
            // Show loader
            $('body').addClass('freeze');
            Swal.showLoading();
          },
          success: function(data){
            $('body').removeClass('freeze');
            Swal.hideLoading();
            if(data['errors']){
              $.each(data['errors'], function(key, value){
                SwalNotificationErrorDanger.fire({
                  title: 'Error!',
                  text: value
                })
                // alert(value)
              });
            }else if (data['success']){
              SwalDoneSuccess.fire({
                title: "Activated!",
                text: "Account Activated",
              }).then((result) => {
                if(result.isConfirmed) {
                  location.reload()
                }
              });
            }else if (data['error']){
              SwalSystemErrorDanger.fire({
                title: 'Update Failed!',
                text: 'Please Try Again or Contact Administrator: admin@fit.bit.lk',
              })
            }
          },
          error: function(err){
            $('body').removeClass('freeze');
            Swal.hideLoading();
            SwalErrorDanger.fire({
              title: 'Update Failed!',
              text: 'Please Try Again or Contact Administrator: admin@fit.bit.lk',
            })
          }
        });   

      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: "Cancelled!",
          text: "Account did not activate",
        })
      }
    })
  }
// /APPROVE




</script>
@endsection