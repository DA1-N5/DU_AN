<div style="margin-top: 150px;"></div>
<h1 class="heading" style="margin-bottom:50px"><span>Giới Thiệu về VNTravel</span> </h1>
<?php
        if (empty($result)) {
        } else {
            foreach ($result as $value) {
                if($value['trang_thai'] == 1){
        ?>
 
<h3 style="text-align: center; "><?= $value['noi_dung'] ?></h3>
<?php
                }
            }
        }
        ?>
        