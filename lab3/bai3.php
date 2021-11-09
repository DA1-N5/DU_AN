<?php
function snt ($x)
{
    for ($i = 2; $i < $x; $i++)
    { 
        if ($x % $i == 0)
        {
            return 0;
        }
    }
    return 1;
}

if (snt(7) == 0)
{
    echo "7 không phải số nguyên tố";
} else {
    echo "7 là số nguyên tố";
}
?>