<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Checkbox va Radio Buttonlar</title>
</head>
<body>
    <h2>Topshiriq 3: Checkbox va Radio buttonlar bilan ishlash</h2>
    
    <form method="POST" action="">
        <h3>Mashg'ulotlar (bir nechta tanlash mumkin):</h3>
        <input type="checkbox" name="mashgulotlar[]" value="Sport"> Sport<br>
        <input type="checkbox" name="mashgulotlar[]" value="Kitob o'qish"> Kitob o'qish<br>
        <input type="checkbox" name="mashgulotlar[]" value="Dasturlash"> Dasturlash<br>
        <input type="checkbox" name="mashgulotlar[]" value="Musiqa"> Musiqa<br><br>
        
        <h3>Jins (faqat bitta tanlash mumkin):</h3>
        <input type="radio" name="jins" value="Erkak"> Erkak<br>
        <input type="radio" name="jins" value="Ayol"> Ayol<br><br>
        
        <h3>Tillar (bir nechta tanlash mumkin):</h3>
        <select name="tillar[]" multiple size="4">
            <option value="O'zbekcha">O'zbekcha</option>
            <option value="Inglizcha">Inglizcha</option>
            <option value="Ruscha">Ruscha</option>
            <option value="Xitoycha">Xitoycha</option>
        </select><br><br>
        
        <input type="submit" value="Yuborish">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        echo "<h3>Qabul qilingan ma'lumotlar:</h3>";
        
        if (!empty($_POST["mashgulotlar"])) {
            $mashgulotlar = array_map('htmlspecialchars', $_POST["mashgulotlar"]);
            echo "<strong>Tanlangan mashg'ulotlar:</strong><br>";
            foreach ($mashgulotlar as $m) {
                echo "- " . $m . "<br>";
            }
            echo "<br>";
        } else {
            echo "<strong>Tanlangan mashg'ulotlar:</strong> Tanlanmagan<br><br>";
        }
        
        if (!empty($_POST["jins"])) {
            $jins = htmlspecialchars($_POST["jins"]);
            echo "<strong>Tanlangan jins:</strong> " . $jins . "<br><br>";
        } else {
            echo "<strong>Tanlangan jins:</strong> Tanlanmagan<br><br>";
        }
        
        if (!empty($_POST["tillar"])) {
            $tillar = array_map('htmlspecialchars', $_POST["tillar"]);
            echo "<strong>Tanlangan tillar:</strong><br>";
            foreach ($tillar as $t) {
                echo "- " . $t . "<br>";
            }
            echo "<br>";
        } else {
            echo "<strong>Tanlangan tillar:</strong> Tanlanmagan<br><br>";
        }
        
        echo "<div style='background-color: #f0f0f0; padding: 10px;'>";
        echo "<strong>\$_SERVER['REQUEST_METHOD']:</strong><br>";
        echo $_SERVER['REQUEST_METHOD'] . "<br><br>";
        
        echo "<strong>print_r(\$_POST):</strong><br>";
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        echo "</div>";
    }
    ?>
</body>
</html>
