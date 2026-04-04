<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>Fayl Yuklash (Rasm)</title>
</head>
<body>
    <h2>Topshiriq 4: Fayl yuklash (Image Upload)</h2>
    
    <?php
    if (!file_exists("uploads")) {
        mkdir("uploads", 0777, true);
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
        
        if ($_FILES["image"]["error"] == 4) {
            echo "<div style='color: red;'>Fayl tanlanmagan!</div>";
        } else {
            
            $rasm_info = getimagesize($_FILES["image"]["tmp_name"]);
            
            if ($rasm_info === false) {
                echo "<div style='color: red;'>Bu rasm fayli emas!</div>";
            } else {
                
                $ruxsat_etilgan = ["jpg", "jpeg", "png", "gif"];
                $fayl_nomi = $_FILES["image"]["name"];
                $fayl_turi = strtolower(pathinfo($fayl_nomi, PATHINFO_EXTENSION));
                
                if (!in_array($fayl_turi, $ruxsat_etilgan)) {
                    echo "<div style='color: red;'>Faqat JPG, JPEG, PNG va GIF formatlariga ruxsat berilgan!</div>";
                } elseif ($_FILES["image"]["size"] > 2 * 1024 * 1024) {
                    echo "<div style='color: red;'>Fayl hajmi 2MB dan oshmasligi kerak!</div>";
                } else {
                    
                    $yangi_nom = uniqid("img_", true) . "." . $fayl_turi;
                    $maqsad = "uploads/" . $yangi_nom;
                    
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $maqsad)) {
                        echo "<div style='background-color: #d4edda; padding: 10px;'>";
                        echo "<h3>Rasm muvaffaqiyatli yuklandi!</h3>";
                        echo "<img src='" . $maqsad . "' style='max-width: 300px;'><br><br>";
                        echo "<strong>Fayl nomi:</strong> " . htmlspecialchars($yangi_nom) . "<br>";
                        echo "<strong>Fayl hajmi:</strong> " . number_format($_FILES["image"]["size"]) . " bayt<br>";
                        echo "<strong>Fayl turi:</strong> " . htmlspecialchars($fayl_turi) . "<br>";
                        echo "<strong>Rasm o'lchami:</strong> " . $rasm_info[0] . "x" . $rasm_info[1] . " piksel<br>";
                        echo "</div>";
                    } else {
                        echo "<div style='color: red;'>Faylni yuklashda xatolik yuz berdi!</div>";
                    }
                }
            }
            
            echo "<div style='background-color: #f0f0f0; padding: 10px; margin-top: 20px;'>";
            echo "<strong>print_r(\$_FILES):</strong><br>";
            echo "<pre>";
            print_r($_FILES);
            echo "</pre>";
            echo "</div>";
        }
    }
    ?>
    
    <form method="POST" action="" enctype="multipart/form-data">
        <label>Rasm tanlang:</label><br>
        <input type="file" name="image" accept="image/*"><br><br>
        <input type="submit" value="Yuklash">
    </form>
</body>
</html>
