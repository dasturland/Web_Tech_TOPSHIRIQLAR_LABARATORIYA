<?php
$talaba = [
    "ism" => "Jaxongir",
    "familiya" => "Sadullayev",
    "yosh" => 20,
    "kurs" => 2,
    "fakultet" => "Amaliy Matematika"
];

echo "Ism: " . $talaba["ism"] . "<br>";
echo "Familiya: " . $talaba["familiya"] . "<br>";
echo "Yosh: " . $talaba["yosh"] . "<br>";
echo "Kurs: " . $talaba["kurs"] . "<br>";
echo "Fakultet: " . $talaba["fakultet"] . "<br><br>";

$talaba["email"] = "jaxongir7sm@gmail.com";
$talaba["telefon"] = "+998975221005";

echo "<pre>";
print_r($talaba);
echo "</pre><br>";

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Kalit</th><th>Qiymat</th></tr>";
foreach ($talaba as $kalit => $qiymat) {
    echo "<tr><td>" . $kalit . "</td><td>" . $qiymat . "</td></tr>";
}
echo "</table><br>";

$kalitlar = array_keys($talaba);
$qiymatlar = array_values($talaba);

echo "Kalitlar: " . implode(", ", $kalitlar) . "<br>";
echo "Qiymatlar: " . implode(", ", $qiymatlar) . "<br><br>";

if (array_key_exists("email", $talaba)) {
    echo "Email mavjud: " . $talaba["email"] . "<br>";
}

if (isset($talaba["telefon"])) {
    echo "Telefon mavjud: " . $talaba["telefon"] . "<br>";
}
echo "<br>";

$mahsulotlar = [
    ["nomi" => "Laptop Acer", "narx" => 5000000],
    ["nomi" => "Smartphone Samsung", "narx" => 3000000],
    ["nomi" => "Tablet Huawei", "narx" => 2000000]
];

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Mahsulot turi</th><th>Nomi</th><th>Narx</th></tr>";
foreach ($mahsulotlar as $mahsulot) {
    echo "<tr>";
    echo "<td>Mahsulot</td>";
    echo "<td>" . $mahsulot["nomi"] . "</td>";
    echo "<td>" . number_format($mahsulot["narx"]) . " so'm</td>";
    echo "</tr>";
}
echo "</table><br>";

$sonlar = ["bir" => 1, "ikki" => 2, "uch" => 3];
$almashtirilgan = array_flip($sonlar);

echo "Almashtirilgan massiv:<br>";
print_r($almashtirilgan);
?>
