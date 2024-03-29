<!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 ChartJS Chart Example - ItSolutionStuff.com</title>
</head>
    
<body>
    <h1>Laravel 9 ChartJS Chart Example - ItSolutionStuff.com</h1>
    <canvas id="myChart" height="100px"></canvas>
</body>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script type="text/javascript">
  
      var labels =  {{ Js::from($labels) }};
      var users =  {{ Js::from($data) }};

      const data = {
        labels: labels,
        datasets: [{
          label: 'Atendimentos',
          data: users,
        }]
      };
  /*
      const config = {
        type: 'line',
        data: data,
        options: {}
      };
*/
      const config = {
        type: 'bar',
        data: data,
        options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        };

  
      const myChart = new Chart(
        document.getElementById('myChart'),
        config
      );
  
</script>
</html>