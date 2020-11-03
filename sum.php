<?php

require_once('db.php');
// if ($conn) {
//     echo "connected";
            
    //     $sql = "SELECT live,COUNT(infor_id) as num FROM inforhome GROUP BY live";
    //         $fire = mysqli_query($conn,$sql);
    //             while($result = mysqli_fetch_assoc($fire)){
    //                 echo "['".$result['live']."',".$result['num']."]";
    //             }
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php
    include('wel_direc.php');
    ?>
    <title>Summary</title>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      google.charts.setOnLoadCallback(drawChart1);
      google.charts.setOnLoadCallback(drawChart2);
      google.charts.setOnLoadCallback(drawChart3);
      google.charts.setOnLoadCallback(drawChart4);
      google.charts.setOnLoadCallback(drawChart5);
      google.charts.setOnLoadCallback(drawChart6);
      google.charts.setOnLoadCallback(drawChart7);
      google.charts.setOnLoadCallback(drawChart8);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['live','num'],
            <?php
            $sql = "SELECT live,COUNT(infor_id) as num FROM inforhome GROUP BY live";
            $fire = mysqli_query($conn,$sql);
                while($result = mysqli_fetch_assoc($fire)){
                    echo "['".$result['live']."',".$result['num']."],";
                }
            ?>

        ]);

        var options = {
          title: 'ข้อมูลสรุปด้านที่อยู่อาศัย'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }


      function drawChart1() {

        var data = google.visualization.arrayToDataTable([
            ['career','num'],
            <?php
             $sql = "SELECT career,COUNT(infor_id) as num FROM inforhome GROUP BY career";
             $fire = mysqli_query($conn,$sql);
                while($result = mysqli_fetch_assoc($fire)){
                echo "['".$result['career']."',".$result['num']."],";
                }
             ?>

            ]);

        var options = {
        title: 'ข้อมูลสรุปด้านอาชีพผู้ปกครอง'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

        chart.draw(data, options);
        }

        function drawChart2() {

            var data = google.visualization.arrayToDataTable([
                ['relationship','num'],
                <?php
                    $sql = "SELECT relationship,COUNT(infor_id) as num FROM inforhome GROUP BY relationship";
                    $fire = mysqli_query($conn,$sql);
                         while($result = mysqli_fetch_assoc($fire)){
                         echo "['".$result['relationship']."',".$result['num']."],";
                        }
                ?>

            ]);

            var options = {
                title: 'ข้อมูลสรุปด้านความสัมพันธ์ของครอบครัว'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
        }
        function drawChart3() {

        var data = google.visualization.arrayToDataTable([
            ['income','num'],
            <?php
                $sql = "SELECT income,COUNT(infor_id) as num FROM inforhome GROUP BY income";
                $fire = mysqli_query($conn,$sql);
                     while($result = mysqli_fetch_assoc($fire)){
                    echo "['".$result['income']."',".$result['num']."],";
                }
            ?>

        ]);

        var options = {
            title: 'ข้อมูลสรุปด้านรายได้ต่อเดือนผู้ปกครอง'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
        }

        function drawChart4() {

            var data = google.visualization.arrayToDataTable([
                ['money','num'],
            <?php
                 $sql = "SELECT money,COUNT(infor_id) as num FROM inforhome GROUP BY money";
                 $fire = mysqli_query($conn,$sql);
                     while($result = mysqli_fetch_assoc($fire)){
                        echo "['".$result['money']."',".$result['num']."],";
                    }
            ?>

            ]);

        var options = {
            title: 'ข้อมูลสรุปด้านรายรับของนักเรียนต่อวัน'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));

        chart.draw(data, options);
        }

        function drawChart5() {

            var data = google.visualization.arrayToDataTable([
                ['goschool','num'],
                <?php
                    $sql = "SELECT goschool,COUNT(infor_id) as num FROM inforhome GROUP BY goschool";
                    $fire = mysqli_query($conn,$sql);
                        while($result = mysqli_fetch_assoc($fire)){
                        echo "['".$result['goschool']."',".$result['num']."],";
                    }
                ?>

            ]);

            var options = {
                title: 'ข้อมูลสรุปด้านการเดินทางไปยังโรงเรียนของนักเรียน'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart5'));

            chart.draw(data, options);
        }

        function drawChart6() {

            var data = google.visualization.arrayToDataTable([
                ['residence','num'],
                <?php
                    $sql = "SELECT residence,COUNT(infor_id) as num FROM inforhome GROUP BY residence";
                    $fire = mysqli_query($conn,$sql);
                         while($result = mysqli_fetch_assoc($fire)){
                         echo "['".$result['residence']."',".$result['num']."],";
                    }
                ?>

            ]);

            var options = {
                title: 'ข้อมูลสรุปด้านลักษณะที่อยู่อาศัย'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart6'));

            chart.draw(data, options);
        }
        function drawChart7() {

            var data = google.visualization.arrayToDataTable([
                ['substance','num'],
                <?php
                $sql = "SELECT substance,COUNT(infor_id) as num FROM inforhome GROUP BY substance";
                $fire = mysqli_query($conn,$sql);
                    while($result = mysqli_fetch_assoc($fire)){
                    echo "['".$result['substance']."',".$result['num']."],";
                    }
                ?>

            ]);

            var options = {
                title: 'ข้อมูลสรุปด้านพฤติกรรมการใช้สารเสพติดของนักเรียน'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart7'));

            chart.draw(data, options);
        }

        function drawChart8() {

            var data = google.visualization.arrayToDataTable([
                ['informant','num'],
                <?php
                $sql = "SELECT informant,COUNT(infor_id) as num FROM inforhome GROUP BY informant";
                $fire = mysqli_query($conn,$sql);
                    while($result = mysqli_fetch_assoc($fire)){
                    echo "['".$result['informant']."',".$result['num']."],";
                }
                ?>

            ]);

            var options = {
                title: 'ข้อมูลสรุปด้านผู้ให้ข้อมูลในการเยี่ยมบ้าน'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart8'));

            chart.draw(data, options);
        }





    </script>
</head>
<body>
    <div class="container">
    <div class="row justify-content-center">
       
        <h>ข้อมูลสรุปการเยี่ยมบ้าน</h>
        <div id="piechart" style="width: 900px; height: 500px;"></div>
        <div id="piechart1" style="width: 900px; height: 500px;"></div>
        <div id="piechart2" style="width: 900px; height: 500px;"></div>
        <div id="piechart3" style="width: 900px; height: 500px;"></div>
        <div id="piechart4" style="width: 900px; height: 500px;"></div>
        <div id="piechart5" style="width: 900px; height: 500px;"></div>
        <div id="piechart6" style="width: 900px; height: 500px;"></div>
        <div id="piechart7" style="width: 900px; height: 500px;"></div>
        <div id="piechart8" style="width: 900px; height: 500px;"></div>
    </div>
    </div>
    
</body>
</html>