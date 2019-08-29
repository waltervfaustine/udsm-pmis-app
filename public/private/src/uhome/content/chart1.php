
<div class="col-md-12">
    <div class="panel panel-default">
        <div id="content" class="panel-heading">
            <h2 class="panel-title">Tender Status</h2>
        </div>
        <div id="piechart" class="panel-body">
            <body>
                <div class="col-md-12"  style="width: 900px; height: 440px;"></div>
            </body>

            <?php
                global $DBInstance;
                $query = "SELECT status, count(*) as numbers FROM tenderlist GROUP BY status";
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
                    ['Status', 'Number'],

                    <?php
                        while($row = mysqli_fetch_array($result)) {
                            if($row["status"] == 'approved') {
                                echo "['Approve Tenders', ".$row['numbers']."],";
                            }else if($row["status"] == 'unapproved') {
                                echo "['UnApprove Tenders', ".$row['numbers']."],";
                            }else if($row["status"] == 'ongoing') {
                                echo "['Current Running Tenders', ".$row['numbers']."],";
                            }else if($row["status"] == 'closed') {
                                echo "['Closed Tenders', ".$row['numbers']."],";
                            }
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



