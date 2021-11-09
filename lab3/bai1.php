<?php
function ham_tinh_giai_thua ($x)
{
    if ($x == 0)
    {
        return 1;
    }
    else
    {
        return $x * ham_tinh_giai_thua($x-1);
    }

}
echo "10! = " . ham_tinh_giai_thua(10) . "<br>";