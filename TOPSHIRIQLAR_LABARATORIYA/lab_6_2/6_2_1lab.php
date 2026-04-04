<?php
$mevalar = ["Olma", "Banan", "Uzum", "Anor", "Nok"];

$ranglar = array("Qizil", "Yashil", "Ko'k", "Sariq");

$sonlar = [];
$sonlar[0] = 10;
$sonlar[1] = 20;
$sonlar[2] = 30;
$sonlar[3] = 40;

echo "Birinchi meva: " . $mevalar[0] . "<br>";
echo "Ikkinchi meva: " . $mevalar[1] . "<br>";
echo "Oxirgi meva: " . $mevalar[count($mevalar) - 1] . "<br><br>";

echo "print_r() bilan:<br>";
print_r($mevalar);
echo "<br><br>";

echo "var_dump() bilan:<br>";
var_dump($mevalar);
echo "<br><br>";

echo "Mevalar soni: " . count($mevalar) . "<br>";
echo "Ranglar soni: " . count($ranglar) . "<br>";
echo "Sonlar soni: " . count($sonlar) . "<br><br>";

echo "Foreach oddiy ro'yxat:<br>";
foreach ($mevalar as $meva) {
    echo $meva . "<br>";
}
echo "<br>";

echo "Foreach indeks bilan:<br>";
foreach ($mevalar as $index => $meva) {
    echo $index . " → " . $meva . "<br>";
}
echo "<br>";

echo "Olma mavjudmi: " . (in_array("Olma", $mevalar) ? "Ha" : "Yo'q") . "<br>";
echo "Uzum indeksi: " . array_search("Uzum", $mevalar) . "<br><br>";

array_push($mevalar, "Gilos", "Shaftoli");
echo "Qo'shilgandan keyin: ";
print_r($mevalar);
echo "<br>";

array_pop($mevalar);
echo "Oxirgi element o'chirilgandan keyin: ";
print_r($mevalar);
echo "<br>";

array_unshift($mevalar, "Qovun");
echo "Boshiga qo'shilgandan keyin: ";
print_r($mevalar);
echo "<br>";

array_shift($mevalar);
echo "Birinchi element o'chirilgandan keyin: ";
print_r($mevalar);
?>
