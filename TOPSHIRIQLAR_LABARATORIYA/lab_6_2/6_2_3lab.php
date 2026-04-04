<?php
$talabalar = [
    ["Ism" => "Jaxongir", "Familiya" => "Sadullayev", "Yosh" => 20, "Ball" => 85],
    ["Ism" => "Ali", "Familiya" => "Valiyev", "Yosh" => 21, "Ball" => 90],
    ["Ism" => "Sardor", "Familiya" => "Karimov", "Yosh" => 19, "Ball" => 78],
    ["Ism" => "Bobur", "Familiya" => "Rahimov", "Yosh" => 22, "Ball" => 92]
];

echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Ism</th><th>Familiya</th><th>Yosh</th><th>Ball</th></tr>";
foreach ($talabalar as $talaba) {
    echo "<tr>";
    echo "<td>" . $talaba["Ism"] . "</td>";
    echo "<td>" . $talaba["Familiya"] . "</td>";
    echo "<td>" . $talaba["Yosh"] . "</td>";
    echo "<td>" . $talaba["Ball"] . "</td>";
    echo "</tr>";
}
echo "</table><br><br>";

$talabalar_batafsil = [
    [
        "ism" => "Jaxongir",
        "familiya" => "Sadullayev",
        "yosh" => 20,
        "balllar" => [
            "matematika" => 85,
            "fizika" => 90,
            "informatika" => 88
        ]
    ],
    [
        "ism" => "Ali",
        "familiya" => "Valiyev",
        "yosh" => 21,
        "balllar" => [
            "matematika" => 92,
            "fizika" => 87,
            "informatika" => 95
        ]
    ]
];

foreach ($talabalar_batafsil as $talaba) {
    echo "<strong>" . $talaba["ism"] . " " . $talaba["familiya"] . "</strong><br>";
    echo "Yosh: " . $talaba["yosh"] . "<br>";
    echo "Fanlar:<br>";
    echo "<ul>";
    foreach ($talaba["balllar"] as $fan => $ball) {
        echo "<li>" . $fan . ": " . $ball . "</li>";
    }
    echo "</ul>";
    
    $ortacha = array_sum($talaba["balllar"]) / count($talaba["balllar"]);
    echo "O'rtacha ball: " . number_format($ortacha, 2) . "<br><br>";
}

$katalog = [
    "Elektronika" => [
        "Noutbuklar" => [
            ["model" => "HP Pavilion", "narx" => 5000000],
            ["model" => "Dell Inspiron", "narx" => 6000000]
        ],
        "Telefonlar" => [
            ["model" => "iPhone 14", "narx" => 10000000],
            ["model" => "Samsung S23", "narx" => 9000000]
        ]
    ],
    "Uy-ro'zg'or" => [
        "Muzlatgichlar" => [
            ["model" => "LG Smart", "narx" => 7000000],
            ["model" => "Samsung Twin", "narx" => 8000000]
        ]
    ]
];

foreach ($katalog as $kategoriya => $turkumlar) {
    echo "<h4>" . $kategoriya . "</h4>";
    foreach ($turkumlar as $turkum => $mahsulotlar) {
        echo "<strong>" . $turkum . "</strong><br>";
        echo "<ul>";
        foreach ($mahsulotlar as $mahsulot) {
            echo "<li>" . $mahsulot["model"] . " - " . number_format($mahsulot["narx"]) . " so'm</li>";
        }
        echo "</ul>";
    }
}
echo "<br>";

$matritsa = [
    [1, 2, 3],
    [4, 5, 6]
];

echo "<table border='1' cellpadding='5'>";
for ($i = 0; $i < 2; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 3; $j++) {
        echo "<td>" . $matritsa[$i][$j] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
