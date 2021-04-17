@section('script')
<script type="text/javascript">

  $(document).ready(function(){

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'District');
        data.addColumn('number', 'Participants');
        data.addRows([
          @php
          foreach($districts as $district):
          //echo "['".$district->name."',".App\Models\Participant::where('application_submit', 1)->where('crew_district', $district->name)->count() ."],";
          echo "['".$district->crew_district."',".App\Models\Participant::where('application_submit', 1)->where('crew_district', $district->crew_district)->count() ."],";
          endforeach;
            
          @endphp
        ]);

        var data1 = new google.visualization.DataTable();
        data1.addColumn('string', 'Countries');
        data1.addColumn('number', 'Participants');
        data1.addRows([
          @php
          foreach($countries as $country):
          //echo "['".$district->name."',".App\Models\Participant::where('application_submit', 1)->where('crew_district', $district->name)->count() ."],";
          echo "['".$country->country."',".App\Models\Participant::where('application_submit', 1)->where('country', $country->country)->count() ."],";
          endforeach;
            
          @endphp
        ]);
        

        // Set chart options
        var options1 = {'height':800};
        var options2 = {};

        // Instantiate and draw our chart, passing in some options.
        var chart1 = new google.visualization.PieChart(document.getElementById('chart_div1'));
        chart1.draw(data, options1);        
        var chart3 = new google.visualization.PieChart(document.getElementById('chart_div3'));
        chart3.draw(data1, options1);
        var chart2 = new google.visualization.BarChart(document.getElementById('chart_div2'));
        chart2.draw(data, options2);
        var chart2 = new google.visualization.BarChart(document.getElementById('chart_div4'));
        chart2.draw(data1, options2);
      }
 

  });

</script>
@endsection