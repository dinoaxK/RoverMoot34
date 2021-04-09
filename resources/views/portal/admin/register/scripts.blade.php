@section('script')
<script type="text/javascript">

  $(document).ready(function(){

    var table = $('.yajra-datatable').DataTable({
      processing: true,
      serverSide: true,
      ajax: 
      {
        url:"{{ route('paricipant.list') }}",
        data : function (d) {
            d.name = $('#name').val();
            d.nic = $('#nic').val();
            d.district = $('#district').val();
            {{-- d.application = $('#application').val();
            d.payment = $('#payment').val(); --}}
            d.registration = $('#registration').val();
        }
      },
      columns: [
          {
            data: 'updated_at', 
            name: 'updated_at' 
          },
          {
            data: 'id', 
            name: 'id' 
          },
          {
            data: 'crew_district', 
            name: 'crew_district'
          },
          {
            data: 'participant_type', 
            name: 'participant_type'
          },
          {
            data: 'full_name', 
            name: 'full_name'
          },
          {
            data: 'gender', 
            name: 'gender'
          },
          {
            data: 'mobile', 
            name: 'mobile'
          },
          {
            data: 'telephone', 
            name: 'telephone'
          },
          {
            data: 'payment_reference', 
            name: 'payment_reference'
          },
          {
            data: 'payment_status', 
            name: 'payment_status'
          },
          {
            data: 'application_status', 
            name: 'application_status'
          },
          {
              data: 'id', 
              name: 'id', 
              orderable: false, 
              searchable: false
          },
      ],
      columnDefs: [
        {
          targets: 9,
          render: function ( data, type, row ) {
            var color = 'success';
            var status = 'Active';
            if (data == 1) {
              color = 'success';
              status = 'check-circle';
            } 
            else if (data == 2){
              color = 'danger';
              status = 'ban';
            }
            else {
              color = 'warning';
              status = 'clock';
            }
            return '<span class="text-'+color+' font-weight-bold"><i class="fa fa-lg fa-'+status+'"></i></span>';
          }
        },
        {
          targets: 10,
          render: function ( data, type, row ) {
            var color = 'success';
            var status = 'Active';
            if (data == 1) {
              color = 'success';
              status = 'check-circle';
            } 
            else if (data == 2){
              color = 'danger';
              status = 'ban';
            }
            else {
              color = 'warning';
              status = 'clock';
            }
            return '<span class="text-'+color+' font-weight-bold"><i class="fa fa-lg fa-'+status+'"></i></span>';
          }
        },
        {
            targets: 11,
            render: function ( data, type, row ) {
              var button_group =  "<div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">"+
                                    "<button title=\"View Profile\" data-tooltip=\"tooltip\"  data-placement=\"bottom\" onclick=\"view_profile("+data+");\" type=\"button\" class=\"btn btn-outline-primary\"><i class=\"fas fa-user\"></i></button>"+
                                    "<button title=\"View Payment Proof\" data-tooltip=\"tooltip\"  data-placement=\"bottom\" onclick=\"view_payment("+data+");\" type=\"button\" class=\"btn btn-outline-primary\"><i class=\"fas fa-dollar-sign\"></i></button>"+
                                    "<button title=\"View Application Proof\" data-tooltip=\"tooltip\"  data-placement=\"bottom\" onclick=\"view_application("+data+");\" type=\"button\" class=\"btn btn-outline-primary\"><i class=\"fas fa-file-alt\"></i></button>"+
                                  "</div>"
                var button = '<a onclick="view_profile('+data+');" title="View Profile" data-tooltip="tooltip"  data-placement="bottom"  type="button" class="btn btn-outline-primary"><i class="fas fa-user"></i></a>'
                return button_group;
            }
        }
      ]
    });

  search = () => {
    table.draw();

  }

  export_excel = () => {

    $('#searcItems').submit();

  }

  $('.form-control').on('change', function(){
    search();
  });


  email_model = () => {
    $('#nameemail').val($('#name').val());
    $('#nicemail').val($('#nic').val());
    $('#applicationemail').val($('#application').val());
    $('#paymentemail').val($('#payment').val());
    $('#registrationemail').val($('#registration').val());
    $('#emailModal').modal('show');
  }

  send_email = () => {
    // FORM PAYLOAD
    var formData = new FormData($("#emailForm")[0]);
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').html('');
    $('.invalid-feedback').hide();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('moot.general.email') }}",
      type: 'post',
      data: formData,
      processData: false,
      contentType: false,           
      beforeSend: function(){
        // Show loader
        $("#emailSpinner").removeClass('d-none');
        $('#btnSendEmail').attr('disabled','disabled');
      },
      success: function(data){
        console.log('Success in send mail ajax.');
        $("#emailSpinner").addClass('d-none');
        $('#btnSendEmail').removeAttr('disabled');
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
            title: 'Sent Successfully!',
            text: 'Email Sent Successfully',
          }).then((result) => {
            if(result.isConfirmed) {
              location.reload()
            }
          });
        }else if (data['error']){
          SwalSystemErrorDanger.fire({
            title: 'Sending Failed!',
            text: 'Please Try Again or Contact Administrator: rovermoot.2021@gmail.com',
          })
        }
      },
      error: function(err){
        $("#emailSpinner").addClass('d-none');
        $('#btnSendEmail').removeAttr('disabled');
        SwalSystemErrorDanger.fire({
          title: 'Sending Failed!'+err,
          text: 'Please Try Again or Contact Administrator: rovermoot.2021@gmail.com',
        })
      }
    });
  }


  view_profile = (id) => {
    var url = '{{ route("participant.profile.admin", ":id") }}';
    url = url.replace(':id', id);
    //    alert (id)
    let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=900,height=700,left=100,top=100`;
    window.open( url,'User_Profile',params)
  }

  view_application = (id) => {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('load.application.admin') }}",
      type: 'post',
      data: {'id':id},          
      beforeSend: function(){
      },
      success: function(data){
        $('#ApplicationModal').modal('show');
        $('.approve').attr('onclick', 'app_approve('+id+');')
        $('.decline').attr('onclick', 'app_decline('+id+');')
        var url='{{ asset("storage/participants/applications/:image") }}';
        url = url.replace(':image', data);
        $('#applicationImage').attr('src', url)
      },
      error: function(err){
        SwalErrorDanger.fire({
          title: 'Application Load Failed!',
          text: 'Please Try Again or Contact Administrator: admin@fit.bit.lk',
        })
      }
    });
  }

  view_payment = (id) => {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('load.payment.admin') }}",
      type: 'post',
      data: {'id':id},          
      beforeSend: function(){
      },
      success: function(data){
        $('#paymentModal').modal('show');
        $('.approve').attr('onclick', 'pay_approve('+id+');')
        $('.decline').attr('onclick', 'pay_decline('+id+');')
        var url='{{ asset("storage/participants/payments/:image") }}';
        url = url.replace(':image', data);
        $('#paymentImage').attr('src', url)
      },
      error: function(err){
        SwalErrorDanger.fire({
          title: 'Application Load Failed!',
          text: 'Please Try Again or Contact Administrator: admin@fit.bit.lk',
        })
      }
    });
  }

  app_approve = (id) => {
    SwalQuestionWarningAutoClose.fire({
      title: "Are you sure?",
      text: "You wont be able to revert this!",
      confirmButtonText: 'Yes, Approve!',
    })
    .then((result) => {
      if(result.isConfirmed){
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ route('approve.application') }}",
          type: 'post',
          data: {'id':id},           
          beforeSend: function(){
            // Show loader
            $('.btn').attr('disabled','disabled');
          },
          success: function(data){
            console.log('Approve Application Ajax Success');
            $('.btn').removeAttr('disabled');
            if (data['success'] == 'success'){
              SwalDoneSuccess.fire({
                title: 'Approved!',
                text: 'Application approved successfully',
              }).then((result) => {
                if(result.isConfirmed) {
                  $('#ApplicationModal').modal('hide');
                  table.draw();
                }
              });
            }else{
              SwalSystemErrorDanger.fire({
                title: 'Application Approve Process Failed!',
              })
            }
          },
          error: function(err){
            console.log('Approve Application Ajax Error');
            $('.btn').removeAttr('disabled');
            SwalSystemErrorDanger.fire({
              title: 'Approve Process Failed!',
            })
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Aborted!',
          text: 'Application approval process aborted.',
        })
      }
    })
  }

  app_decline = (id) => {
    SwalQuestionDanger.fire({
      title: "Are you sure ?",
      text: "Application wil be Declined",
      confirmButtonText: "Yes, Decline!",
    })
    .then((result) => {
      if (result.isConfirmed) {
        $('#ApplicationModal').modal('hide');
        SwalQuestionDanger.fire({
          title: "Reason to Decline ?",
          input: 'textarea',
          inputLabel: 'Your application was declined due to ',
          inputPlaceholder: 'Type your message here...',
          inputAttributes: {
            'aria-label': 'Type your message here'
          },
          inputValidator: (value) => {
            if (!value) {
              return 'You need to write something!'
            }
          },
          timer: false,
          showCancelButton: true,
          confirmButtonText: "Decline!",
        }).then((result1) => {
          //alert(result.value)
          
          if (result1.isConfirmed) {          
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: "{{ route('decline.application') }}",
              type: 'post',
              data: { 'message': result1.value, 'id': id},         
              beforeSend: function(){
                // Show loader
                $('.btn').attr('disabled','disabled');
              },
              success: function(data){
                console.log('Decline Application Ajax Success');
                $('.btn').removeAttr('disabled');
                if (data['success'] == 'success'){
                  SwalDoneSuccess.fire({
                    title: 'Declined!',
                    text: 'Application declined successfully',
                  }).then((result) => {
                    if(result.isConfirmed) {
                      table.draw();
                    }
                  });
                }else{
                  SwalSystemErrorDanger.fire({
                    title: 'Application Decline Process Failed!',
                  })
                }

              },
              error: function(err){
                $('.btn').removeAttr('disabled');
                console.log('Decline Application Ajax Error');
                $('.btn').removeAttr('disabled');
                  SwalSystemErrorDanger.fire({
                    title: 'Decline Process Failed!',
                })
              }
            });
          }
          else{
            SwalNotificationWarningAutoClose.fire({
              title: 'Aborted!',
              text: 'Application decline process aborted.',
            })
          }

        })
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Aborted!',
          text: 'Application decline process aborted.',
        })
      }
    })
  }

  pay_approve = (id) => {
    SwalQuestionWarningAutoClose.fire({
      title: "Are you sure?",
      text: "You wont be able to revert this!",
      confirmButtonText: 'Yes, Approve!',
    })
    .then((result) => {
      if(result.isConfirmed){
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ route('approve.payment') }}",
          type: 'post',
          data: {'id':id},           
          beforeSend: function(){
            // Show loader
            $('.btn').attr('disabled','disabled');
          },
          success: function(data){
            console.log('Approve Payment Ajax Success');
            $('.btn').removeAttr('disabled');
            if (data['success'] == 'success'){
              SwalDoneSuccess.fire({
                title: 'Approved!',
                text: 'Payment approved successfully',
              }).then((result) => {
                if(result.isConfirmed) {
                  $('#paymentModal').modal('hide');
                  table.draw();
                }
              });
            }else{
              SwalSystemErrorDanger.fire({
                title: 'Payment Approve Process Failed!',
              })
            }
          },
          error: function(err){
            console.log('Approve Payment Ajax Error');
            $('.btn').removeAttr('disabled');
            SwalSystemErrorDanger.fire({
              title: 'Approve Process Failed!',
            })
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Aborted!',
          text: 'Payment approval process aborted.',
        })
      }
    })
  }

  pay_decline = (id) => {
    SwalQuestionDanger.fire({
      title: "Are you sure ?",
      text: "Payment wil be Declined",
      confirmButtonText: "Yes, Decline!",
    })
    .then((result) => {
      if (result.isConfirmed) {
        $('#paymentModal').modal('hide');
        SwalQuestionDanger.fire({
          title: "Reason to Decline ?",
          input: 'textarea',
          inputLabel: 'Your payment was declined due to ',
          inputPlaceholder: 'Type your message here...',
          inputAttributes: {
            'aria-label': 'Type your message here'
          },
          inputValidator: (value) => {
            if (!value) {
              return 'You need to write something!'
            }
          },
          timer: false,
          showCancelButton: true,
          confirmButtonText: "Decline!",
        }).then((result1) => {
          //alert(result.value)
          
          if (result1.isConfirmed) {          
            $.ajax({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              url: "{{ route('decline.payment') }}",
              type: 'post',
              data: { 'message': result1.value, 'id': id},         
              beforeSend: function(){
                // Show loader
                $('.btn').attr('disabled','disabled');
              },
              success: function(data){
                console.log('Decline Payment Ajax Success');
                $('.btn').removeAttr('disabled');
                if (data['success'] == 'success'){
                  SwalDoneSuccess.fire({
                    title: 'Declined!',
                    text: 'Payment declined successfully',
                  }).then((result) => {
                    if(result.isConfirmed) {
                      table.draw();
                    }
                  });
                }else{
                  SwalSystemErrorDanger.fire({
                    title: 'Payment Decline Process Failed!',
                  })
                }

              },
              error: function(err){
                $('.btn').removeAttr('disabled');
                console.log('Decline Payment Ajax Error');
                $('.btn').removeAttr('disabled');
                  SwalSystemErrorDanger.fire({
                    title: 'Decline Process Failed!',
                })
              }
            });
          }
          else{
            SwalNotificationWarningAutoClose.fire({
              title: 'Aborted!',
              text: 'Payment decline process aborted.',
            })
          }

        })
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Aborted!',
          text: 'Application decline process aborted.',
        })
      }
    })
  }

  });

</script>
@endsection