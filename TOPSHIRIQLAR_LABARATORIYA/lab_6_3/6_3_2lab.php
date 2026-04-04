<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <title>POST Usuli Bilan Forma Validatsiyasi</title>
    <style>
        .error {
            border: 2px solid red;
        }
        .error-text {
            color: red;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h2>Topshiriq 2: POST usuli va forma validatsiyasi</h2>
    
    <?php
    $ism = $email = $parol = $parol2 = $yosh = "";
    $ism_err = $email_err = $parol_err = $parol2_err = $yosh_err = "";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        if (empty($_POST["ism"])) {
            $ism_err = "Ism majburiy";
        } elseif (strlen($_POST["ism"]) < 3) {
            $ism_err = "Ism kamida 3 ta belgi bo'lishi kerak";
        } elseif (!preg_match("/^[a-zA-Z\s]+$/", $_POST["ism"])) {
            $ism_err = "Ism faqat harflar va bo'sh joylardan iborat bo'lishi kerak";
        } else {
            $ism = htmlspecialchars($_POST["ism"]);
        }
        
        if (empty($_POST["email"])) {
            $email_err = "Email majburiy";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $email_err = "Email formati noto'g'ri";
        } else {
            $email = htmlspecialchars($_POST["email"]);
        }
        
        if (empty($_POST["parol"])) {
            $parol_err = "Parol majburiy";
        } elseif (strlen($_POST["parol"]) < 8) {
            $parol_err = "Parol kamida 8 ta belgi bo'lishi kerak";
        } else {
            $parol = $_POST["parol"];
        }
        
        if (empty($_POST["parol2"])) {
            $parol2_err = "Parolni tasdiqlash majburiy";
        } elseif ($_POST["parol"] !== $_POST["parol2"]) {
            $parol2_err = "Parollar mos kelmadi";
        } else {
            $parol2 = $_POST["parol2"];
        }
        
        if (empty($_POST["yosh"])) {
            $yosh_err = "Yosh majburiy";
        } elseif (!is_numeric($_POST["yosh"])) {
            $yosh_err = "Yosh raqam bo'lishi kerak";
        } elseif ($_POST["yosh"] < 18 || $_POST["yosh"] > 100) {
            $yosh_err = "Yosh 18 dan 100 gacha bo'lishi kerak";
        } else {
            $yosh = htmlspecialchars($_POST["yosh"]);
        }
        
        if (empty($ism_err) && empty($email_err) && empty($parol_err) && empty($parol2_err) && empty($yosh_err)) {
            echo "<div style='background-color: #d4edda; padding: 10px; margin-top: 20px;'>";
            echo "<h3>Muvaffaqiyatli ro'yxatdan o'tdingiz!</h3>";
            echo "Ism: " . $ism . "<br>";
            echo "Email: " . $email . "<br>";
            echo "Yosh: " . $yosh . "<br>";
            echo "</div>";
        }
    }
    ?>
    
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>To'liq ism:</label><br>
        <input type="text" name="ism" value="<?php echo $ism; ?>" class="<?php echo !empty($ism_err) ? 'error' : ''; ?>"><br>
        <?php if (!empty($ism_err)) echo "<span class='error-text'>" . $ism_err . "</span><br>"; ?>
        <br>
        
        <label>Email:</label><br>
        <input type="text" name="email" value="<?php echo $email; ?>" class="<?php echo !empty($email_err) ? 'error' : ''; ?>"><br>
        <?php if (!empty($email_err)) echo "<span class='error-text'>" . $email_err . "</span><br>"; ?>
        <br>
        
        <label>Parol:</label><br>
        <input type="password" name="parol" class="<?php echo !empty($parol_err) ? 'error' : ''; ?>"><br>
        <?php if (!empty($parol_err)) echo "<span class='error-text'>" . $parol_err . "</span><br>"; ?>
        <br>
        
        <label>Parolni tasdiqlash:</label><br>
        <input type="password" name="parol2" class="<?php echo !empty($parol2_err) ? 'error' : ''; ?>"><br>
        <?php if (!empty($parol2_err)) echo "<span class='error-text'>" . $parol2_err . "</span><br>"; ?>
        <br>
        
        <label>Yosh:</label><br>
        <input type="text" name="yosh" value="<?php echo $yosh; ?>" class="<?php echo !empty($yosh_err) ? 'error' : ''; ?>"><br>
        <?php if (!empty($yosh_err)) echo "<span class='error-text'>" . $yosh_err . "</span><br>"; ?>
        <br>
        
        <input type="submit" value="Ro'yxatdan o'tish">
    </form>
</body>
</html>
