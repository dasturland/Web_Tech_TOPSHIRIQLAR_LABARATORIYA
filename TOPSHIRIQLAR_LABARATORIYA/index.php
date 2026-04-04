<?php
$tasks = [
    'lab_6_1' => [
        'title' => 'Laboratoriya 6.1 - Asosiy Tushunchalar',
        'items' => [
            ['file' => '6_1_1lab.php', 'name' => 'Topshiriq 1: Birinchi PHP dasturi'],
            ['file' => '6_1_2lab.php', 'name' => 'Topshiriq 2: O\'zgaruvchilar va ma\'lumot turlari'],
            ['file' => '6_1_3lab.php', 'name' => 'Topshiriq 3: Arifmetik operatorlar'],
            ['file' => '6_1_4lab.php', 'name' => 'Topshiriq 4: Taqqoslash va mantiqiy operatorlar']
        ]
    ],
    'lab_6_2' => [
        'title' => 'Laboratoriya 6.2 - Massivlar',
        'items' => [
            ['file' => '6_2_1lab.php', 'name' => 'Topshiriq 1: Oddiy massivlar bilan ishlash'],
            ['file' => '6_2_2lab.php', 'name' => 'Topshiriq 2: Assosiativ massivlar'],
            ['file' => '6_2_3lab.php', 'name' => 'Topshiriq 3: Ko\'p o\'lchovli massivlar'],
            ['file' => '6_2_4lab.php', 'name' => 'Topshiriq 4: Massiv funksiyalari'],
            ['file' => '6_2_5lab.php', 'name' => 'Topshiriq 5: Talabalar boshqaruv tizimi']
        ]
    ],
    'lab_6_3' => [
        'title' => 'Laboratoriya 6.3 - Formalar va Ma\'lumot Yuborish',
        'items' => [
            ['file' => '6_3_1lab.php', 'name' => 'Topshiriq 1: GET usuli bilan forma'],
            ['file' => '6_3_2lab.php', 'name' => 'Topshiriq 2: POST usuli va validatsiya'],
            ['file' => '6_3_3lab.php', 'name' => 'Topshiriq 3: Checkbox va Radio buttonlar'],
            ['file' => '6_3_4lab.php', 'name' => 'Topshiriq 4: Fayl yuklash (Image Upload)']
        ]
    ]
];
?>
<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>PHP Laboratoriya Ishlari</title>
</head>
<body>
    <h1>Web texnalogiyalar Laboratoriya (1,2,3) </h1>
    
    <div>
        <p><strong>Ism:</strong> Sadullayev Jaxongir</p>
        <p><strong>Guruh:</strong> 172_23</p>
    </div>
    
    <hr>
    
    <?php foreach ($tasks as $folder => $lab): ?>
        <h2><?php echo $lab['title']; ?></h2>
        <ul>
            <?php foreach ($lab['items'] as $task): ?>
                <li>
                    <a href="<?php echo $folder . '/' . $task['file']; ?>">
                        <?php echo $task['name']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <br>
    <?php endforeach; ?>
</body>
</html>
