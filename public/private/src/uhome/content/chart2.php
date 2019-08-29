
<div class="col-md-12">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Tender Status</h2>
        </div>
        <div id="piechart" class="panel-body">
            <body>
                <div class="col-md-12"  style="width: 900px; height: 400px;"></div>
            </body>

            <?php
                global $DBInstance;
                $query = "SELECT name , count(*) as numbers FROM department GROUP BY title";
                $result = mysqli_query($DBInstance->returnConnection(), $query);
            ?>

            <html>
            <head>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);

                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                    ['Name', 'Number'],

                    <?php
                        while($row = mysqli_fetch_array($result)) {
                            echo "['".$row['name']."', ".$row['numbers']."],";
                        }
                    ?>
                    ]);

                    var options = {
                    title: 'Approved, Unaapproved, Current Running and Closed Tenders'
                    };

                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

                    chart.draw(data, options);
                }
                </script>
            </head>
            
            </html>
        </div>
    </div>
</div>



