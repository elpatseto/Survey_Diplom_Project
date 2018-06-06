<?php
require_once 'header.php';

if (!isUserLogged()){
    header("Location: login.php");
}
if ($_SESSION['user_group'] == 1) {

    $query = "DELETE FROM survey_headers 
              WHERE id = ?";
    if (!$stmt = $DBH->prepare($query)) {
        print("Грешна заявка: $query");
        exit;
    }

    if (!$stmt->bind_param("i", $_GET['surveyID'])) {
        print("Не се байндва!");
        exit;
    }
} else {
    $query = "DELETE FROM survey_headers 
              WHERE id = ? 
              AND users_id = ?";

    if (!$stmt = $DBH->prepare($query)) {
        print("Грешна заявка: $query");
        exit;
    }

    if (!$stmt->bind_param("is", $_GET['surveyID'], $_SESSION['user'])) {
        print("Не се байндва!");
        exit;
    }
}
if (!$stmt->execute()) {
    print("Не се изпълнява заявката! " . $DBH->error);
    exit;
}
if(isUserLogged() == 0) {
    header("Location: userTests.php");
}else {
    header("Location: admin.php");
}
