<?php
$x = 10;
$y = 20;
$z = "10";

echo "x = " . $x . ", y = " . $y . ", z = '" . $z . "'<br><br>";

echo "Taqqoslash operatorlari:<br>";
echo "x == z (qiymat tengligi): " . ($x == $z ? "true" : "false") . "<br>";
echo "x === z (qiymat va tur tengligi): " . ($x === $z ? "true" : "false") . "<br>";
echo "x != y (teng emas): " . ($x != $y ? "true" : "false") . "<br>";
echo "x !== z (tur ham teng emas): " . ($x !== $z ? "true" : "false") . "<br>";
echo "x < y (kichik): " . ($x < $y ? "true" : "false") . "<br>";
echo "x > y (katta): " . ($x > $y ? "true" : "false") . "<br>";
echo "x <= 10 (kichik yoki teng): " . ($x <= 10 ? "true" : "false") . "<br>";
echo "y >= 20 (katta yoki teng): " . ($y >= 20 ? "true" : "false") . "<br><br>";

$a = true;
$b = false;

echo "Mantiqiy operatorlar:<br>";
echo "a = true, b = false<br>";
echo "a AND b: " . ($a && $b ? "true" : "false") . "<br>";
echo "a OR b: " . ($a || $b ? "true" : "false") . "<br>";
echo "NOT a: " . (!$a ? "true" : "false") . "<br>";
echo "NOT b: " . (!$b ? "true" : "false") . "<br>";
?>
