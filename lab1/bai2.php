<?php
    $url = 'https://caodang.fpt.edu.vn/nganh-hoc/thiet-ke-website';
    $url = parse_url($url);
    echo 'Scheme: ' . $url['scheme'] . '<br>';
    echo 'Host: ' . $url['host'] . '<br>';
    echo 'Path: ' . $url['path'] . '<br>';
?>