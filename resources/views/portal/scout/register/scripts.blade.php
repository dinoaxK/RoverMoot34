@section('script')
<script type="text/javascript">

  // FULL NAME 
  $('.name').change(function(){
    var first_name = $('#firstName').val()
    var middle_names = $('#middleName').val()
    var last_name = $('#lastName').val()

    $('#fullName').val(first_name + ' ' + middle_names + ' ' + last_name);

  }); 
  // /FULL NAME 

  $('#citizenship').change(function(){
    if( $('#citizenship').val() == 'Foreign National' ){
      $('#crewDistrict').val('Foreign');
      $("#idType[value='passport']").prop("checked",true);
    }
  });


  // SAVE PARTICIPANT
  save_info = () => {

    
    // FORM PAYLOAD
    var formData = new FormData($("#scoutRegisterForm")[0]);
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').html('');
    $('.invalid-feedback').hide();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('moot.register.save') }}",
      type: 'post',
      data: formData,
      processData: false,
      contentType: false,           
      beforeSend: function(){
        // Show loader
        $("#btnSaveScoutSpinner").removeClass('d-none');
        $('#btnSaveScout').attr('disabled','disabled');
      },
      success: function(data){
        $("#btnSaveScoutSpinner").addClass('d-none');
        $('#btnSaveScout').removeAttr('disabled');
        if(data['errors']){
          $.each(data['errors'], function(key, value){
            $('#'+key+'-err').show();
            $('#'+key).addClass('is-invalid');
            $('#'+key+'-err').append(value);   
            window.location.hash = '#'+key;
          });
        }else if (data['success']){
          $('.form-control').val('');
          SwalDoneSuccess.fire({
            title: 'Saved Successfully!',
            text: 'Information Saved Successfully',
          }).then((result) => {
            if(result.isConfirmed) {
              location.reload()
            }
          });
        }else if (data['error']){
          SwalSystemErrorDanger.fire({
            title: 'Saving Failed!',
            text: 'Please Try Again or Contact Administrator: rovermoot.2021@gmail.com',
          })
        }
      },
      error: function(err){
        $("#btnSaveScoutSpinner").addClass('d-none');
        $('#btnSaveScout').removeAttr('disabled');
        SwalSystemErrorDanger.fire({
          title: 'Saving Failed!',
          text: 'Please Try Again or Contact Administrator: rovermoot.2021@gmail.com',
        })
      }
    });
  }
  // /SAVE PARTICIPANT

  // SUBMIT PARTICIPANT
  submit_application = () => {

        
    // FORM PAYLOAD
    var formData = new FormData($("#scoutRegisterForm")[0]);
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').html('');
    $('.invalid-feedback').hide();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('moot.register.submit') }}",
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
            $('#'+key+'-err').append(value);   
            window.location.hash = '#'+key;
          });
        }else if (data['success']){
          $('.form-control').val('');
          SwalDoneSuccess.fire({
            title: 'Application Submitted!',
            text: 'Application Submitted Successfully',
          }).then((result) => {
            if(result.isConfirmed) {
              print_application();
              location.reload()
            }
          });
        }else if (data['error']){
          SwalSystemErrorDanger.fire({
            title: 'Submit Failed!',
            text: 'Please Try Again or Contact Administrator: rovermoot.2021@gmail.com',
          })
        }
      },
      error: function(err){
        $("#btnSubmitScoutSpinner").addClass('d-none');
        $('#btnSubmitScout').removeAttr('disabled');
        SwalSystemErrorDanger.fire({
          title: 'Submit Failed!',
          text: 'Please Try Again or Contact Administrator: rovermoot.2021@gmail.com',
        })
      }
    });
  }
  // /SUBMIT PARTICIPANT

  // PRINT APPLICATION
  print_application = () => {
    var url = '{{ route("moot.application.print") }}';             
    let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=1500,height=700,left=100,top=100`;
    window.open( url,'User_Profile',params)
  }
  // /PRINT APPLICATION



  
  // SUBMIT SCANNED APPLICATION
  submit_scanned_application = () => {

        
    // FORM PAYLOAD
    var formData = new FormData($("#applicationProofForm")[0]);
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').html('');
    $('.invalid-feedback').hide();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('moot.application.scanned') }}",
      type: 'post',
      data: formData,
      processData: false,
      contentType: false,           
      beforeSend: function(){
        // Show loader
        $("#btnScannedScoutSpinner").removeClass('d-none');
        $('#btnScannedScout').attr('disabled','disabled');
      },
      success: function(data){
        $("#btnScannedScoutSpinner").addClass('d-none');
        $('#btnScannedScout').removeAttr('disabled');
        if(data['errors']){
          $.each(data['errors'], function(key, value){
            $('#'+key+'-err').show();
            $('#'+key).addClass('is-invalid');
            $('#'+key+'-err').append(value);   
            window.location.hash = '#'+key;
          });
        }else if (data['success']){
          $('.form-control').val('');
          SwalDoneSuccess.fire({
            title: 'Scanned Application Submitted!',
            text: 'Scanned Application Submitted Successfully',
          }).then((result) => {
            if(result.isConfirmed) {
              location.reload()
            }
          });
        }else if (data['error']){
          SwalSystemErrorDanger.fire({
            title: 'Submit Failed!',
            text: 'Please Try Again or Contact Administrator: rovermoot.2021@gmail.com',
          })
        }
      },
      error: function(err){
        $("#btnScannedScoutSpinner").addClass('d-none');
        $('#btnScannedScout').removeAttr('disabled');
        SwalSystemErrorDanger.fire({
          title: 'Submit Failed!',
          text: 'Please Try Again or Contact Administrator: rovermoot.2021@gmail.com',
        })
      }
    });
  }
  // SUBMIT SCANNED APPLICATION


  // UPLOAD PROFILE IMAGE
  upload_profile_image = () => {

    // FORM PAYLOAD
    var formData = new FormData($("#profileImageForm")[0]);
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').html('');
    $('.invalid-feedback').hide();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('moot.application.profile.Image') }}",
      type: 'post',
      data: formData,
      processData: false,
      contentType: false,           
      beforeSend: function(){
        // Show loader
        $("#btnUploadProfileImageSpinner").removeClass('d-none');
        $('#btnUploadProfileImage').attr('disabled','disabled');
      },
      success: function(data){
        $("#btnUploadProfileImageSpinner").addClass('d-none');
        $('#btnUploadProfileImage').removeAttr('disabled');
        if(data['errors']){
          $.each(data['errors'], function(key, value){
            $('#'+key+'-err').show();
            $('#'+key).addClass('is-invalid');
            $('#'+key+'-err').append(value);   
            window.location.hash = '#'+key;
          });
        }else if (data['success']){
          $('.form-control').val('');
          SwalDoneSuccess.fire({
            title: 'Profile Picture Uploaded!',
            text: 'Profile Picture Uploaded Successfully',
          }).then((result) => {
            if(result.isConfirmed) {
              location.reload()
            }
          });
        }else if (data['error']){
          SwalSystemErrorDanger.fire({
            title: 'Upload Failed!',
            text: 'Please Try Again or Contact Administrator: rovermoot.2021@gmail.com',
          })
        }
      },
      error: function(err){
        $("#btnUploadProfileImageSpinner").addClass('d-none');
        $('#btnUploadProfileImage').removeAttr('disabled');
        SwalSystemErrorDanger.fire({
          title: 'Upload Failed!',
          text: 'Please Try Again or Contact Administrator: rovermoot.2021@gmail.com',
        })
      }
    });
  }
  // /UPLOAD PROFILE IMAGE


  // DELETE PROFILE IMAGE
  delete_profile_image = () => {

    SwalQuestionWarningAutoClose.fire({
      title: 'Are you sure?',
      text: 'You must upload your Profile Image once again if you delete.',
    }).then((result) => {
      if(result.isConfirmed){
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ route('moot.application.delete.profile.image') }}",
          type: 'post',
          processData: false,
          contentType: false,           
          beforeSend: function(){
            // Show loader
            $("#btnDeleteImageSpinner").removeClass('d-none');
            $('#btnDeleteImage').attr('disabled','disabled');
          },
          success: function(data){
            $("#btnDeleteImageSpinner").addClass('d-none');
            $('#btnDeleteImage').removeAttr('disabled');
            if (data['status'] = 'success'){
              SwalDoneSuccess.fire({
                title: 'Profile Image Deleted!',
                text: 'Please upload corrected profile image again',
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
            $("#btnDeleteImageSpinner").addClass('d-none');
            $('#btnDeleteImage').removeAttr('disabled');
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
  // /DELETE PROFILE IMAGE

    // DELETE PROFILE IMAGE
  delete_payment_proof = () => {

    SwalQuestionWarningAutoClose.fire({
      title: 'Are you sure?',
      text: 'You must upload your payment image once again if you delete.',
    }).then((result) => {
      if(result.isConfirmed){
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ route('moot.application.delete.payment.proof') }}",
          type: 'post',
          processData: false,
          contentType: false,           
          beforeSend: function(){
            // Show loader
            $("#btnDeletePaymentSpinner").removeClass('d-none');
            $('#btnDeletePayment').attr('disabled','disabled');
          },
          success: function(data){
            $("#btnDeletePaymentSpinner").addClass('d-none');
            $('#btnDeletePayment').removeAttr('disabled');
            if (data['status'] = 'success'){
              SwalDoneSuccess.fire({
                title: 'Payment Image Deleted!',
                text: 'Please upload corrected payment image again',
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
            $("#btnDeletePaymentSpinner").addClass('d-none');
            $('#btnDeletePayment').removeAttr('disabled');
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
  // /DELETE PROFILE IMAGE

</script>
@endsection