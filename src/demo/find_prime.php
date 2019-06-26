<html>
<head>
    <meta charset="utf-8">
    <title>求素数</title>
</head>
<body>

<p><?php
    //请在此处补全代码
    $n = 0;
    $sum = 0;
    $match = false;

    for ($i = 1000; $i > 0; $i--) {
        for ($j = 2; $j < $i; $j++) {
            if ($i % $j == 0) {
                $match = false;
                break;
            }
            if ($i - $j == 1) {
                $match = true;
            }
        }
        if ($match) {
            $n++;
            $sum += $i;
            if ($n >= 20) {
                break;
            }
        }
    }
    echo $sum;
    ?></p>
</body>
</html>