<div class="content-wrapper">
    <section class="content-header">
        <h1 style="text-align: center; font-size: 30px; margin: 30px;">
            Thống Kê
        </h1>
    </section>

    <section style="margin: 0 auto; max-width: 1000px">
        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr; grid-gap: 30px">
            <?php
                if($_SESSION['admin']['vai_tro'] == 2){
            ?>
            <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br><?=count($admin)?> Quản Trị Viên</span></a>
            <?php
            }
            ?>
            <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br><?=count($khach_hang)?> Khách Hàng</span></a>
            <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br><?=count($tour)?> Tour</span></a>
            <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br><?=count($don_hang)?> Đơn Hàng</span></a>
            <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br><?=count($slider)?> Slider</span></a>
        </div>
        <div style="display:grid; grid-template-columns:1fr 1fr">
            <div id="piechart" class="col-5" style="margin-top: 20px;"></div>
            <div id="piechart1" class="col-5" style="margin-top: 20px;"></div>
        </div>
        
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 8],
                ['Eat', 2],
                ['TV', 4],
                ['Gym', 2],
                ['Sleep', 8]
                ]);
                var options = {'title':'Tour'};
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['Work', 8],
                ['Eat', 2],
                ['TV', 4],
                ['Gym', 2],
                ['Sleep', 8]
                ]);
                var options = {'title':'Đơn Hàng'};
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
                chart.draw(data, options);
            }
        </script>

    </section>
</div>