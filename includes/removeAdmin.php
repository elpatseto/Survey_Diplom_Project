<?php
require_once 'header.php';

if(!isUserLogged()){
    header("Location: login.php");
}

if ($_SESSION['user_group'] == 1){
    $query = "UPDATE users SET user_group = 2 WHERE username = ?";

    if (!$stmt = $DBH->prepare($query)) {
        print("Грешна заявка: $query");
        exit;
    }

    if (!$stmt->bind_param("s", $_POST['userNoadmin'])) {
        print("Не се байндва!");
        exit;
    }
    if (!$stmt->execute()) {
        print("Не се изпълнява заявката! " . $DBH->error);
        exit;
    }
}

header("Location: admin.php");
