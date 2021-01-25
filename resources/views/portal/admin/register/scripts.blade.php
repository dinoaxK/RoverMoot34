@section('script')
<script type="text/javascript">

  $(document).ready(function(){

    var table = $('.yajra-datatable').DataTable({
      searching: false,
      processing: true,
      serverSide: true,
      ajax: "{{ route('paricipant.list') }}",
      columns: [
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
              orderable: true, 
              searchable: true
          },
      ],
      columnDefs: [
        {
          targets: 8,
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
              var button_group =  "<div class=\"btn-group\" role=\"group\" aria-label=\"Basic example\">"+
                                    "<button title=\"View Profile\" data-tooltip=\"tooltip\"  data-placement=\"bottom\" onclick=\"view_profile("+data+");\" type=\"button\" class=\"btn btn-outline-primary\"><i class=\"fas fa-user\"></i></button>"+
                                    "<button title=\"View Application Proof\" data-tooltip=\"tooltip\"  data-placement=\"bottom\" onclick=\"view_application("+data+");\" type=\"button\" class=\"btn btn-outline-primary\"><i class=\"fas fa-file-alt\"></i></button>"+
                                    "<button title=\"View Payment Proof\" data-tooltip=\"tooltip\"  data-placement=\"bottom\" onclick=\"view_payment("+data+");\" type=\"button\" class=\"btn btn-outline-primary\"><i class=\"fas fa-dollar-sign\"></i></button>"+
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


  view_profile = (id) => {
    var url = '{{ route("participant.profile.admin", ":id") }}';
    url = url.replace(':id', id);
    //    alert (id)
    let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=900,height=700,left=100,top=100`;
    window.open( url,'User_Profile',params)
  }

  view_application = (id) => {
    var url = '{{ route("participant.application.admin", ":id") }}';
    url = url.replace(':id', id);
    //    alert (id)
    let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=900,height=700,left=100,top=100`;
    window.open( url,'User_Profile',params)
  }

  view_payment = (id) => {
    var url = '{{ route("participant.payment.admin", ":id") }}';
    url = url.replace(':id', id);
    //    alert (id)
    let params = `scrollbars=no,resizable=no,status=no,location=no,toolbar=no,menubar=no,width=900,height=700,left=100,top=100`;
    window.open( url,'User_Profile',params)
  }

  });

</script>
@endsection