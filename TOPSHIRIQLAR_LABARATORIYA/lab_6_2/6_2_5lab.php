<?php
$talabalar = [
    [
        "id" => 1,
        "ism" => "Jaxongir",
        "familiya" => "Sadullayev",
        "yosh" => 20,
        "guruh" => "172_23",
        "balllar" => [
            "matematika" => 85,
            "fizika" => 90,
            "dasturlash" => 88
        ]
    ],
    [
        "id" => 2,
        "ism" => "Ali",
        "familiya" => "Valiyev",
        "yosh" => 21,
        "guruh" => "172_23",
        "balllar" => [
            "matematika" => 92,
            "fizika" => 87,
            "dasturlash" => 95
        ]
    ],
    [
        "id" => 3,
        "ism" => "Sardor",
        "familiya" => "Karimov",
        "yosh" => 19,
        "guruh" => "173_23",
        "balllar" => [
            "matematika" => 78,
            "fizika" => 82,
            "dasturlash" => 80
        ]
    ],
    [
        "id" => 4,
        "ism" => "Bobur",
        "familiya" => "Rahimov",
        "yosh" => 22,
        "guruh" => "173_23",
        "balllar" => [
            "matematika" => 95,
            "fizika" => 91,
            "dasturlash" => 93
        ]
    ]
];

echo "<h3>Barcha talabalar</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>ID</th><th>To'liq ism</th><th>Yosh</th><th>Guruh</th><th>O'rtacha ball</th></tr>";
foreach ($talabalar as $talaba) {
    $ortacha = array_sum($talaba["balllar"]) / count($talaba["balllar"]);
    echo "<tr>";
    echo "<td>" . $talaba["id"] . "</td>";
    echo "<td>" . $talaba["ism"] . " " . $talaba["familiya"] . "</td>";
    echo "<td>" . $talaba["yosh"] . "</td>";
    echo "<td>" . $talaba["guruh"] . "</td>";
    echo "<td>" . number_format($ortacha, 2) . "</td>";
    echo "</tr>";
}
echo "</table><br>";

$guruh_filter = "172_23";
$filterlangan = array_filter($talabalar, function($t) use ($guruh_filter) {
    return $t["guruh"] === $guruh_filter;
});

echo "<h3>Guruh: " . $guruh_filter . "</h3>";
echo "Talabalar soni: " . count($filterlangan) . "<br>";
echo "<ul>";
foreach ($filterlangan as $talaba) {
    echo "<li>" . $talaba["ism"] . " " . $talaba["familiya"] . "</li>";
}
echo "</ul><br>";

$ortalachalar = array_map(function($t) {
    return array_sum($t["balllar"]) / count($t["balllar"]);
}, $talabalar);

$eng_yuqori_ball = max($ortalachalar);
$eng_yaxshi_index = array_search($eng_yuqori_ball, $ortalachalar);
$eng_yaxshi = $talabalar[$eng_yaxshi_index];

echo "<h3>Eng yaxshi talaba</h3>";
echo "Ism-familiya: " . $eng_yaxshi["ism"] . " " . $eng_yaxshi["familiya"] . "<br>";
echo "Guruh: " . $eng_yaxshi["guruh"] . "<br>";
echo "O'rtacha ball: " . number_format($eng_yuqori_ball, 2) . "<br><br>";

$fanlar = ["matematika", "fizika", "dasturlash"];
echo "<h3>Fanlar bo'yicha statistika</h3>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Fan</th><th>O'rtacha</th><th>Maksimal</th><th>Minimal</th></tr>";
foreach ($fanlar as $fan) {
    $fan_ballari = array_column($talabalar, $fan, null);
    $fan_values = [];
    foreach ($talabalar as $t) {
        $fan_values[] = $t["balllar"][$fan];
    }
    $orta = array_sum($fan_values) / count($fan_values);
    $maks = max($fan_values);
    $min = min($fan_values);
    echo "<tr>";
    echo "<td>" . $fan . "</td>";
    echo "<td>" . number_format($orta, 2) . "</td>";
    echo "<td>" . $maks . "</td>";
    echo "<td>" . $min . "</td>";
    echo "</tr>";
}
echo "</table><br>";

$saralangan = $talabalar;
usort($saralangan, function($a, $b) {
    $ortA = array_sum($a["balllar"]) / count($a["balllar"]);
    $ortB = array_sum($b["balllar"]) / count($b["balllar"]);
    return $ortB <=> $ortA;
});

echo "<h3>O'rtacha ball bo'yicha saralash (kamayish)</h3>";
echo "<ol>";
foreach ($saralangan as $talaba) {
    $ortacha = array_sum($talaba["balllar"]) / count($talaba["balllar"]);
    echo "<li>" . $talaba["ism"] . " " . $talaba["familiya"] . " - " . number_format($ortacha, 2) . "</li>";
}
echo "</ol><br>";

$jami_talabalar = count($talabalar);
$guruhlar = count(array_unique(array_column($talabalar, "guruh")));
$umumiy_ortacha = array_sum($ortalachalar) / count($ortalachalar);

echo "<h3>Umumiy statistika</h3>";
echo "Jami talabalar soni: " . $jami_talabalar . "<br>";
echo "Guruhlar soni: " . $guruhlar . "<br>";
echo "Umumiy o'rtacha ball: " . number_format($umumiy_ortacha, 2) . "<br>";
?>
