<?php
function cong ($x, $y)
{
    $kq = $x + $y;
    return $kq;
}

function tru ($x, $y)
{
    $kq = $x - $y;
    return $kq;
}

function nhan ($x, $y)
{
    $kq = $x * $y;
    return $kq;
}

function chia ($x, $y)
{
    $kq = $x / $y;
    return $kq;
}

echo "Cho x = 10, y = 2 <br>";
echo "<br>x + y = " . cong(10,2);
echo "<br>x - y = " . tru(10,2);
echo "<br>x * y = " . nhan(10,2);
echo "<br>x : y = " . chia(10,2) . "<br>";
?>