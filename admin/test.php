<?php
$con  = mysqli_connect("localhost","root","","covoiturage");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT  source,destination,count(*) AS frq FROM offres GROUP BY source,destination ORDER BY time DESC";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $productname[]  = $row['source']." >> ".$row['destination'];
            $sales[] = $row['frq'];
        }
 
 
 }
 
 
?>
<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title> 
    </head>
    <body>
        <div style="width:80%;hieght:20%;text-align:center">
            <h2 class="page-header" ></h2></br></br>
            <canvas  id="chartjs_bar" width="900" ></canvas> 
        </div>    
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            label: '',
                             fill: false,
                             lineTension: 0.1,
                             backgroundColor: "#C965A3",
                             borderColor: "#C965A3",
                             pointHoverBackgroundColor: "#C965A3",
                             pointHoverBorderColor: "#C965A3",
                            backgroundColor: [
                               "#C965A3",
                                "#ff407b",
                                "#25d5f2",
                                "#ffc750",
                                "#2ec551",
                                "#7040fa",
                                "#ff004e"
                            ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                        
                    },
                    options: {
                           legend: {
                        display: false,
                        position: 'bottom',
 
                        labels: {
                            fontColor: '#71748d',
                            fontFamily: 'Circular Std Book',
                            fontSize: 14,
                            
                        }
                    },
 
 
                }
                });
    </script>
</html>