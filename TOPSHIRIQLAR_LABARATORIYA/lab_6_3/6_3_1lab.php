<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>GET Usuli Bilan Forma</title>
</head>
<body>
    <h2>Topshiriq 1: GET usuli bilan forma</h2>
    
    <form method="GET" action="">
        <label>Ism:</label><br>
        <input type="text" name="ism"><br><br>
        
        <label>Yosh:</label><br>
        <input type="number" name="yosh"><br><br>
        
        <label>Shahar:</label><br>
        <input type="text" name="shahar"><br><br>
        
        <input type="submit" value="Yuborish">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "GET" && !empty($_GET)) {
        $ism = htmlspecialchars($_GET["ism"]);
        $yosh = htmlspecialchars($_GET["yosh"]);
        $shahar = htmlspecialchars($_GET["shahar"]);
        
        echo "<h3>Qabul qilingan ma'lumotlar:</h3>";
        echo "Ism: " . $ism . "<br>";
        echo "Yosh: " . $yosh . "<br>";
        echo "Shahar: " . $shahar . "<br><br>";
        
        echo "<div style='background-color: #f0f0f0; padding: 10px;'>";
        echo "<strong>\$_SERVER['QUERY_STRING']:</strong><br>";
        echo $_SERVER['QUERY_STRING'] . "<br><br>";
        
        echo "<strong>print_r(\$_GET):</strong><br>";
        echo "<pre>";
        print_r($_GET);
        echo "</pre>";
        echo "</div>";
    }
    ?>
</body>
</html>
