@section('script')
<script type="text/javascript">

$(document).ready(function(){
  
  document.title = "{{ $participant->full_name }}";
  $('body').css('background-color', '#fff');
  $('footer').addClass('d-none');
  $('nav').addClass('d-none');

  window.print();

  // window.location.replace("{{ route('home') }}")
});

</script>
@endsection