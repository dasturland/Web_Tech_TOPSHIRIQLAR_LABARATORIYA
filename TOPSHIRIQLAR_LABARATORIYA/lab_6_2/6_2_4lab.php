<?php
$sonlar = [5, 2, 8, 1, 9, 3, 7, 4, 6];

echo "Asl massiv: " . implode(", ", $sonlar) . "<br><br>";

$sort_copy = $sonlar;
sort($sort_copy);
echo "O'sish tartibida: " . implode(", ", $sort_copy) . "<br>";

$rsort_copy = $sonlar;
rsort($rsort_copy);
echo "Kamayish tartibida: " . implode(", ", $rsort_copy) . "<br><br>";

$massiv1 = ["olma", "anor"];
$massiv2 = ["uzum", "nok"];
$birlashgan = array_merge($massiv1, $massiv2);
echo "Birlashgan massiv: " . implode(", ", $birlashgan) . "<br><br>";

$mevalar = ["Olma", "Banan", "Uzum", "Anor", "Nok", "Gilos"];
$kesilgan = array_slice($mevalar, 1, 3);
echo "Kesilgan massiv: " . implode(", ", $kesilgan) . "<br><br>";

$takrorli = [1, 2, 2, 3, 4, 4, 5, 5, 5];
$unikal = array_unique($takrorli);
echo "Asl: " . implode(", ", $takrorli) . "<br>";
echo "Takrorsiz: " . implode(", ", $unikal) . "<br><br>";

$asl = [1, 2, 3, 4, 5];
$teskari = array_reverse($asl);
echo "Asl: " . implode(", ", $asl) . "<br>";
echo "Teskari: " . implode(", ", $teskari) . "<br><br>";

$range_massiv = range(1, 12);
$chunked = array_chunk($range_massiv, 3);
echo "Bo'laklangan massiv:<br>";
foreach ($chunked as $index => $guruh) {
    echo "Guruh " . ($index + 1) . ": " . implode(", ", $guruh) . "<br>";
}
echo "<br>";

$to_oon = range(1, 10);
$juft = array_filter($to_oon, function($n) { return $n % 2 == 0; });
$toq = array_filter($to_oon, function($n) { return $n % 2 != 0; });
echo "Juft sonlar: " . implode(", ", $juft) . "<br>";
echo "Toq sonlar: " . implode(", ", $toq) . "<br><br>";

$raqamlar = [1, 2, 3, 4, 5];
$kvadratlar = array_map(function($n) { return $n * $n; }, $raqamlar);
echo "Kvadratlar: " . implode(", ", $kvadratlar) . "<br><br>";

$yigindi = array_reduce($raqamlar, function($carry, $item) {
    return $carry + $item;
}, 0);
echo "Yig'indi: " . $yigindi . "<br><br>";

$balllar = [85, 92, 78, 95, 88];
echo "Maksimal: " . max($balllar) . "<br>";
echo "Minimal: " . min($balllar) . "<br>";
echo "Yig'indi: " . array_sum($balllar) . "<br>";
echo "O'rtacha: " . number_format(array_sum($balllar) / count($balllar), 2) . "<br>";
?>
