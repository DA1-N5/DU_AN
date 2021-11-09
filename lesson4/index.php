<?php
include './ultil.php';
sayhello();

function increment(&$a, &$b) {
    $a++;
    $b++;
}
$x = 3; $y = 8;
increment($x, $y);

echo 'x = ' . $x . '<br>';
echo 'y = ' . $y;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>