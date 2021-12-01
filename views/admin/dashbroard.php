<div class="content-wrapper">
    <section class="content-header">
        <h1 style="text-align: center; font-size: 30px; margin: 30px;">
            Thống Kê
        </h1>
    </section>

    <section class="col-md-12">
        <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 1fr 1fr; grid-gap: 30px">
            <?php
            if ($_SESSION['admin']['vai_tro'] == 2) {
            ?>
                <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br><?= count($admin) ?> Quản Trị Viên</span></a>
            <?php
            }
            ?>
            <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br><?= count($khach_hang) ?> Khách Hàng</span></a>
            <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br><?= count($tour) ?> Tour</span></a>
            <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br><?= count($don_hang) ?> Đơn Hàng</span></a>
            <a href="#" class="btn btn-default"><span style="font-size: 20px;">Có <br><?= count($slider) ?> Slider</span></a>
        </div>
        <div style="display:grid; grid-template-columns:1fr 1fr;">
            <div id="piechart" style="margin-top: 20px;"></div>
            <div id="piechart1" style="margin-top: 20px;"></div>
        </div>

        <div id="chart_div" style="width: 100%; height: 500px;"></div>

        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Danh mục', 'Thống kê tour'],
                    <?php
                    foreach ($danh_muc as $ct) {
                        $tours = getSelect_by_id('tour', 'id_danhmuc', intval($ct['id']));
                    ?>
                    ['<?= $ct['ten'] . ' (' . count($tours) . ')' ?>', <?= count($tours) ?>],
                    <?php } ?>
                ]);
                var options = {
                    'title': 'Tour'
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Danh mục', 'Thống kê đơn hàng'],
                    <?php
                    foreach ($danh_muc as $ct) {
                        $don_hang = select_order_by_id_category(intval($ct['id']));
                    ?>
                    ['<?= $ct['ten'] . ' (' . count($don_hang) . ')' ?>', <?= count($don_hang) ?>],
                    <?php  } ?>
                ]);
                var options = {
                    'title': 'Đơn Hàng'
                };
                var chart = new google.visualization.PieChart(document.getElementById('piechart1'));
                chart.draw(data, options);
            }
        </script>
        <script type="text/javascript">
            google.charts.load('current', {
                'packages': ['corechart']
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Thời gian', 'Doanh Thu'],
                    <?php
                    foreach ($don_hang_month as $dh) {
                        $price = select_price_by_id_day($dh['ngay_tao']);
                    ?>
                    ['<?=$dh['ngay_tao']?>', <?=$price[0]['gia']?>],
                    <?php  } ?>
                ]);

                var options = {
                    title: 'Doanh Thu Trong Tháng',
                    hAxis: {
                        title: 'Ngày',
                        titleTextStyle: {
                            color: '#333'
                        }
                    },
                    vAxis: {
                        minValue: 0
                    }
                };

                var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
    </section>
</div>