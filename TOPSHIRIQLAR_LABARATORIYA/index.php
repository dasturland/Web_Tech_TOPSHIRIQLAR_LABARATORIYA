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

    <!-- Lab 6.5 - Sessions, Cookies, Headers, AJAX -->
    <h2>Laboratoriya 6.5 - Sessiyalar va AJAX</h2>
    <ul>
        <li><a href="lab_6_5/index.php">Lab 6.5 index</a></li>
        <li><a href="lab_6_5/task1.php">1. Remember me (cookie)</a></li>
        <li><a href="lab_6_5/task2.php">2. Session counter (visits)</a></li>
        <li><a href="lab_6_5/task3.php">3. Simple cart (session)</a></li>
        <li><a href="lab_6_5/task5.php?token=secret123">4. API (token auth, headers, cache)</a></li>
        <li><a href="lab_6_5/task5_redirect.php">6. 301 redirect to task5</a></li>
        <li><a href="lab_6_5/task5_test.html">8. AJAX live search test</a></li>
    </ul>

    <!-- Lab 6.6 - SQLite, Auth, Products, Posts -->
    <h2>Laboratoriya 6.6 - SQLite va autentifikatsiya</h2>
    <ul>
        <li><a href="lab_6_6/init_db.php">Init DB (run once)</a></li>
        <li><a href="lab_6_6/register.php">1. Register</a></li>
        <li><a href="lab_6_6/login.php">1. Login</a></li>
        <li><a href="lab_6_6/task5.php">2-4. Products (CSV, filter, soft delete)</a></li>
        <li><a href="lab_6_6/posts.php">5. Posts & Comments</a></li>
        <li><a href="lab_6_6/change_password.php">6. Change password</a></li>
        <li><a href="lab_6_6/stats.php">7. Statistics (GROUP BY)</a></li>
    </ul>
</body>
</html>
