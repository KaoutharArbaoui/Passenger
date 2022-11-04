<?php
$con  = mysqli_connect("localhost","root","","covoiturage");
 if (!$con) {
     # code...
    echo "Problem in database connection! Contact administrator!" . mysqli_error();
 }else{
         $sql ="SELECT id, 
                --    (SELECT count(id) FROM offres WHERE time BETWEEN'2021-06-01 00:00:00' AND '2021-07-01 00:00:00' ) AS id ,
                        time FROM offres ORDER BY time";
         $result = mysqli_query($con,$sql);
         $chart_data="";
         while ($row = mysqli_fetch_array($result)) { 
 
            $productname[]  = $row['time'];
            $sales[] = $row['id'];
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
        <div style="width:60%;hieght:20%;text-align:center">
            <h2 class="page-header" >Rapport d'analyse des trajets </h2></br></br>
            <!-- <div>Trajets</div> -->
            <canvas  id="chartjs_bar" width="900" ></canvas> 
        </div>    
    </body>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script type="text/javascript">
      var ctx = document.getElementById("chartjs_bar").getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels:<?php echo json_encode($productname); ?>,
                        datasets: [{
                            label: 'trajets',
                             fill: false,
                             lineTension: 0.1,
                             backgroundColor: "rgba(59, 89, 152, 0.75)",
                             borderColor: "rgba(59, 89, 152, 1)",
                             pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
                             pointHoverBorderColor: "rgba(59, 89, 152, 1)",
                        //     backgroundColor: [
                        //        "#5969ff",
                        //         "#ff407b",
                        //         "#25d5f2",
                        //         "#ffc750",
                        //         "#2ec551",
                        //         "#7040fa",
                        //         "#ff004e"
                        //     ],
                            data:<?php echo json_encode($sales); ?>,
                        }]
                        
                    },
                    options: {
                           legend: {
                        display: true,
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