<?php
$a = 25;
$b = 4;

echo "a = " . $a . ", b = " . $b . "<br><br>";

echo "Qo'shish (+): " . ($a + $b) . "<br>";
echo "Ayirish (-): " . ($a - $b) . "<br>";
echo "Ko'paytirish (*): " . ($a * $b) . "<br>";
echo "Bo'lish (/): " . ($a / $b) . "<br>";
echo "Qoldiq (%): " . ($a % $b) . "<br>";
echo "Darajaga ko'tarish (**): " . ($a ** $b) . "<br><br>";

$x = 10;
echo "Dastlabki x qiymati: " . $x . "<br>";
$x++;
echo "Increment (++): " . $x . "<br>";
$x--;
echo "Decrement (--): " . $x . "<br><br>";

$y = 15;
$y += 5;
echo "15 + 5 = " . $y . "<br>";
$y -= 3;
echo "20 - 3 = " . $y . "<br>";
$y *= 2;
echo "17 * 2 = " . $y . "<br>";
$y /= 4;
echo "34 / 4 = " . $y . "<br>";
?>
