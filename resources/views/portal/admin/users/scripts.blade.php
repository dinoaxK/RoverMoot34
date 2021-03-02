@section('script')
<script type="text/javascript">

  $(document).ready(function(){

    var table = $('.yajra-datatable').DataTable({
      processing: true,
      serverSide: true,

      ajax: "{{ route('user.list') }}",
      columns: [
          {
            data: 'id', 
            name: 'id'
          },
          {
            data: 'name', 
            name: 'name'
          },
          {
            data: 'email', 
            name: 'email'
          },
          {
            data: 'role', 
            name: 'role'
          },
          {
            data: 'status', 
            name: 'status'
          },
          {
              data: 'id', 
              name: 'id', 
              orderable: true, 
              searchable: true
          },
      ],
      columnDefs: [
        {
          targets: 4,
          render: function ( data, type, row ) {
            var status = 'success';
            if(data == 'active'){
              status='success';
            }else{              
              status='danger';
            }
            return '<i class="fas fa-circle text-'+status+'"></i>';
          }
        },        
        {
          targets: 5,
          render: function ( data, type, row ) {
            var color = 'success';
            var func = 'deactivate';
            var status = 'Activate';
            if (row['status'] == 'active') {
              status = 'Deactivate';
              color = 'danger';
              func = 'deactivate';
            }
            else {
              status = 'Activate';
              color = 'success';
              func = 'activate';
            }
            return  '<button onclick="'+func+'('+row['id']+')" class="btn btn-'+color+' font-weight-bold">'+status+'</button>'+
                    '<button onclick="edit_user_modal('+row['id']+')" class="btn btn-warning font-weight-bold ml-3">Edit</button>';
          }
        }
      ]
    });

  search = () => {
    table.draw();

  }

  activate = (id) => {
    // alert (id+' activated');
    SwalQuestionWarningAutoClose.fire({
      title: "Are you sure?",
      text: "You wont be able to revert this!",
      confirmButtonText: 'Yes, Re-activate!',
    })
    .then((result) => {
      if(result.isConfirmed){
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ route('user.activate') }}",
          type: 'post',
          data: {'id':id},           
          beforeSend: function(){
            // Show loader
            $('.btn').attr('disabled','disabled');
          },
          success: function(data){
            console.log('Re-activate User Ajax Success');
            $('.btn').removeAttr('disabled');
            if (data['success'] == 'success'){
              SwalDoneSuccess.fire({
                title: 'Re-activated!',
                text: 'Re-activated User successfully',
              }).then((result) => {
                if(result.isConfirmed) {
                  table.draw();
                }
              });
            }else{
                  table.draw();
              SwalSystemErrorDanger.fire({
                title: 'Re-activate User Process Failed!',
              })
            }
          },
          error: function(err){
            console.log('Re-activate User Ajax Error');
            $('.btn').removeAttr('disabled');
                  table.draw();
            SwalSystemErrorDanger.fire({
              title: 'DeactRe-activateivate User Failed!',
            })
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Aborted!',
          text: 'Re-activate User process aborted.',
        })
      }
    })
  }

  deactivate = (id) => {
    // alert (id+' deactivated');
    SwalQuestionWarningAutoClose.fire({
      title: "Are you sure?",
      text: "You wont be able to revert this!",
      confirmButtonText: 'Yes, Deactivate!',
    })
    .then((result) => {
      if(result.isConfirmed){
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ route('user.deactivate') }}",
          type: 'post',
          data: {'id':id},           
          beforeSend: function(){
            // Show loader
            $('.btn').attr('disabled','disabled');
          },
          success: function(data){
            console.log('Deactivate User Ajax Success');
            $('.btn').removeAttr('disabled');
            if (data['success'] == 'success'){
              SwalDoneSuccess.fire({
                title: 'Deactivated!',
                text: 'Deactivated User successfully',
              }).then((result) => {
                if(result.isConfirmed) {
                  table.draw();
                }
              });
            }else{
                  table.draw();
              SwalSystemErrorDanger.fire({
                title: 'Deactivate User Process Failed!',
              })
            }
          },
          error: function(err){
            console.log('Deactivate User Ajax Error');
            $('.btn').removeAttr('disabled');
                  table.draw();
            SwalSystemErrorDanger.fire({
              title: 'Deactivate User Failed!',
            })
          }
        });
      }
      else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Aborted!',
          text: 'Deactivate User process aborted.',
        })
      }
    })
  }

  // CREATE USER
  create_user = () => {    
    // FORM PAYLOAD
    var formData = new FormData($("#createUserForm")[0]);
    $('.form-control').removeClass('is-invalid');
    $('.invalid-feedback').html('');
    $('.invalid-feedback').hide();
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('user.create') }}",
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
          $('#createUserModal').modal('hide');
          $('.form-control').val('');
          SwalDoneSuccess.fire({
            title: 'Saved Successfully!',
            text: 'Information Saved Successfully',
          }).then((result) => {
            if(result.isConfirmed) {
              table.draw();
            }
          });
        }else if (data['error']){
          table.draw();
          SwalSystemErrorDanger.fire({
            title: 'Saving Failed!',
            text: 'Please Try Again or Contact Administrator: admin@scout.lk',
          })
        }
      },
      error: function(err){
        table.draw();
        $('.btn').removeAttr('disabled');
        SwalSystemErrorDanger.fire({
          title: 'Saving Failed!',
          text: 'Please Try Again or Contact Administrator: admin@scout.lk',
        })
      }
    });
  }
  // /CREATE USER

  // GET EDIT DETAILS TO MODAL
  edit_user_modal = (id) => {
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "{{ route('user.edit.get.details') }}",
      type: 'post',
      data: {'id':id},           
      beforeSend: function(){
        // Show loader
        $('.btn').attr('disabled','disabled');
      },
      success: function(data){
        console.log('Get User Details Ajax Success');
        $('.btn').removeAttr('disabled');
        $('#editUserModal').modal('show');
        $('#editRole').val(data['role']);
        $('#editUserId').val(data['id']);
      },
      error: function(err){
        console.log('Get User Details Ajax Error');
        $('.btn').removeAttr('disabled');
        table.draw();
        SwalSystemErrorDanger.fire({
          title: 'Get User Details Failed!',
        })
      }
    });
  }
  // /GET EDIT DETAILS TO MODAL

  // UPDATE USER
  update_user = () => {

    SwalQuestionWarningAutoClose.fire({
      title: "Are you sure?",
      text: "You wont be able to revert this!",
      confirmButtonText: 'Yes, Update!',
    })
    .then((result) => {
      if(result.isConfirmed){
        // FORM PAYLOAD
        var formData = new FormData($("#editUserForm")[0]);
        $('.form-control').removeClass('is-invalid');
        $('.invalid-feedback').html('');
        $('.invalid-feedback').hide();
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "{{ route('user.update') }}",
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
            if (data['success']){
              $('#editUserModal').modal('hide');
              $('.form-control').val('');
              SwalDoneSuccess.fire({
                title: 'Saved Successfully!',
                text: 'Information Saved Successfully',
              }).then((result) => {
                if(result.isConfirmed) {
                  table.draw();
                }
              });
            }else if (data['error']){
              table.draw();
              SwalSystemErrorDanger.fire({
                title: 'Update Failed!',
                text: 'Please Try Again or Contact Administrator: admin@scout.lk',
              })
            }
          },
          error: function(err){
            table.draw();
            $('.btn').removeAttr('disabled');
            SwalSystemErrorDanger.fire({
              title: 'Saving Failed!',
              text: 'Please Try Again or Contact Administrator: admin@scout.lk',
            })
          }
        });
      }else{
        SwalNotificationWarningAutoClose.fire({
          title: 'Aborted!',
          text: 'Update User process aborted.',
        })
      }
    })
  }
  // /UPDATE USER

  });

</script>
@endsection