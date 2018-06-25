<?php
require_once "header.php";
$dropDownChoice = "Създай";
require_once 'nav-login.php';
?>
    <!-- Header -->
    <header>
        <div class="header-content">
            <div class="header-content-inner">
                <h1>МавериК</h1>
                <p>Създай собсвен тест, анкета или викторина</p>
                <a href="#row promo" class="btn btn-primary btn-lg">Старт</a>
            </div>
        </div>
    </header>
<?php

// Генерира се мд5 хешът на паролата. Използвайте и променливата $secretKey
$password = md5($_POST['password'] . $secretKey);

// SQL заявката за проверка
$query = "SELECT username, user_group FROM users WHERE username = ? AND password_hashed = ?";

// Изпълнение на заявката като параметризирана
if (!$stmt = $DBH->prepare($query)) {
    print("Грешна заявка: $query");
    exit;
}

if (!$stmt->bind_param("ss", $_POST['username'], $password)) {
    print("Не се байндва!");
    exit;
}

if (!$stmt->execute()) {
    print("Не се изпълнява заявката! " . $DBH->error);
    exit;
}

if (!$result = $stmt->get_result()) {
    print("Не взема резултат! " . $DBH->error);
    exit;
}

// Проверка дали има потребител с такива име и парола
if ($row = $result->fetch_assoc()) {
    // Да, има потребител с такива име и парола
    // Обновете lastLogin атрибута
    $query = "UPDATE users SET last_login_dt = ? WHERE username = ? ";

    if (!$stmt = $DBH->prepare($query)) {
        print("Грешна заявка: $query");
        exit;
    }

    $invite_dt = date("Y-m-d H:i:s", time());

    if (!$stmt->bind_param("ss", $invite_dt, $row['username'])) {
        print("Не се байндва!");
        exit;
    }

    if (!$stmt->execute()) {
        print("Не се изпълнява заявката! " . $DBH->error);
        exit;
    }

    // Съхранете в сесията следнтие данни:
    // - потребителско име
    $_SESSION['user'] = $row['username'];
    // - код на потребителската група
    $_SESSION['user_group'] = $row['user_group'];
    // - времевия маркер кога последно е бил активен потребителя
    $_SESSION['last_active'] = time();
    // - мд5 хеша на идентификационния стринг на браузъра
    $_SESSION['idhash'] = md5($_SERVER['HTTP_USER_AGENT']);

    // return <кода на потребителската група>;

    print '<body><script type="text/javascript">
 
    var url = "index.php";
   
    swaHelloUser();
    setTimeout(function () {
        window.location = url;
    }, 1500);
    
    </script></body>';

} else {
    // Невалидни потребителско име и/или парола
    header("Location: login.php?error=1");
}
